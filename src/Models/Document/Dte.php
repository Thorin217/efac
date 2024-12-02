<?php

namespace Exactum\Efac\Models\Document;

use App\Models\User;
use Exactum\Efac\Exceptions\CustomHttpException;
use Exactum\Efac\Exceptions\FailedSendException;
use Exactum\Efac\Http\Resources\Token\DteTokenResource;
use Exactum\Efac\Jobs\External\CCF\MakeCCFJsonTokenJob;
use Exactum\Efac\Jobs\External\CD\MakeCDEJsonTokenJob;
use Exactum\Efac\Jobs\External\CR\MakeCREJsonTokenJob;
use Exactum\Efac\Jobs\External\FC\MakeBasicJsonTokenJob;
use Exactum\Efac\Jobs\External\FEX\MakeFEXJsonTokenJob;
use Exactum\Efac\Jobs\External\FSE\MakeFSEJsonTokenJob;
use Exactum\Efac\Jobs\External\NC\MakeNCEJsonTokenJob;
use Exactum\Efac\Jobs\External\ND\MakeNDEJsonTokenJob;
use Exactum\Efac\Jobs\External\NR\MakeNRJsonTokenJob;
use Exactum\Efac\Models\Details\CreItem;
use Exactum\Efac\Models\Details\DteItem;
use Exactum\Efac\Models\Enterprise\DteThirdParty;
use Exactum\Efac\Models\Enterprise\ProductService;
use Exactum\Efac\Models\Enterprise\ReceiverEntity;
use Exactum\Efac\Models\Enterprise\SalePoint;
use Exactum\Efac\Models\Enterprise\ThirdParty;
use Exactum\Efac\Models\Event\Cancellation;
use Exactum\Efac\Models\Event\Contingency;
use Exactum\Efac\Models\External\DteType;
use Exactum\Efac\Models\External\ModelType;
use Exactum\Efac\Models\External\OperationCondition;
use Exactum\Efac\Models\External\OperationType;
use Exactum\Efac\Models\External\PropertyObject;
use Exactum\Efac\Models\Summary\CreSummary;
use Exactum\Efac\Models\Summary\Summary;
use Exactum\Efac\Models\Token\DteToken;
use Exactum\Efac\Services\External\ExternalService;
use App\Traits\ApplyFiltersTrait;
use Carbon\Carbon;
use Exactum\Efac\Efac;
use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Models\Enterprise\Entity;
use Exactum\Efac\Models\Summary\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Dte extends Model
{
    use LogsActivity;

    protected $fillable = [
        'dte_type_id',
        'model_type_id',
        'operation_type_id',
        'sale_point_id',
        'entity_id',
        'receiver_entity_id',
        'user_id',
        'property_object_id',
        'contingency_id',
        'operation_condition_id',
        'number_control',
        'generate_code',
        'status',
        'date',
        'remote_id',
        'documentable_id',
        'documentable_type'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    private $attributeTableName = [ #phantomsIds
        1 => 'total_item_no_subject',
        2 => 'total_item_exempt',
        3 => 'total_item'
    ];

    private $makeJsonTokensJobs = [
        1 => MakeBasicJsonTokenJob::class,
        2 => MakeCCFJsonTokenJob::class,
        3 => MakeNRJsonTokenJob::class,
        4 => MakeNCEJsonTokenJob::class,
        5 => MakeNDEJsonTokenJob::class,
        6 => MakeCREJsonTokenJob::class,
        9 => MakeFEXJsonTokenJob::class,
        10 => MakeFSEJsonTokenJob::class,
        11 => MakeCDEJsonTokenJob::class,
    ];

    // Start Relationships functions
    /**
     * Model dependencies
     */
    public function dteType()
    {
        return $this->belongsTo(DteType::class);
    }

    public function modelType()
    {
        return $this->belongsTo(ModelType::class);
    }

    public function operationType()
    {
        return $this->belongsTo(OperationType::class);
    }

    public function salePoint()
    {
        return $this->belongsTo(SalePoint::class);
    }

    public function receiverEntity()
    {
        return $this->belongsTo(ReceiverEntity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propertyObject()
    {
        return $this->belongsTo(PropertyObject::class);
    }

    public function contingency()
    {
        return $this->belongsTo(Contingency::class);
    }

    public function operationCondition()
    {
        return $this->belongsTo(OperationCondition::class);
    }

    /**
     * The following models depend on this model
     */
    public function tokens()
    {
        return $this->hasMany(DteToken::class);
    }

    public function lastToken()
    {
        return $this->hasOne(DteToken::class)->latest();
    }

    public function relatedDocuments()
    {
        return $this->hasMany(RelatedDocument::class);
    }

    public function mainRelatedDocument()
    {
        return $this->hasOne(RelatedDocument::class, 'main_dte_id');
    }

    public function cancellation()
    {
        return $this->hasOne(Cancellation::class);
    }

    public function replaceCancellation()
    {
        return $this->hasOne(Cancellation::class, 'new_dte_id');
    }

    public function appendices()
    {
        return $this->hasMany(Appendix::class);
    }

    public function otherDocuments()
    {
        return $this->hasMany(OtherDocument::class);
    }

    public function extensions()
    {
        return $this->hasMany(Extension::class);
    }

    public function creItems()
    {
        return $this->hasMany(CreItem::class);
    }

    public function dteItems()
    {
        return $this->hasMany(DteItem::class);
    }

    public function creSummary()
    {
        return $this->hasOne(CreSummary::class);
    }

    public function summary()
    {
        return $this->hasOne(Summary::class);
    }

    public function exportation()
    {
        return $this->hasOne(Exportation::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * M-M relationships
     */
    public function thirdParties()
    {
        return $this->belongsToMany(ThirdParty::class)
            ->using(DteThirdParty::class);
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class)
            ->using(DteStep::class)
            ->withPivot('complete')
            ->orderBy('order');
    }

    // End Relationship functions

    /**
     * Method for logsActivity
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    /**
     * Format of number control
     * DTE-AA-BBBBCCCC-000000000000001(d{15})
     * 1- "DTE"
     * 2- (AA) goes_id for dte type
     * 3- (BBBB) alphanumeric code for subsidiary or if does not exist (0000)
     * 4- (CCCC) alphanumeric code for Sale point or if does not exist (0000)
     * 5- d{15} 15 digit numbers, to be filled with 0 on the left, reset every year
     */
    private static function generateNumberControl($dte)
    {
        $dteTypeId = $dte->dte_type_id;
        $dataDteType = DteType::find($dteTypeId);
        $salePoint = SalePoint::find($dte->sale_point_id)->load(['subsidiary']);

        $codeSubsidiary = $salePoint->subsidiary->code ?? DefaultsEnum::CodeOutlet->value;
        $codeSalePoint = $salePoint->code ?? DefaultsEnum::CodeOutlet->value;

        $countDocuments = self::where('dte_type_id', $dteTypeId)
            ->whereYear('date', Carbon::now()->year)
            ->whereHas('salePoint.subsidiary.emitterEntity', function ($query) use ($salePoint) {
                $query->whereId($salePoint->subsidiary->emitterEntity->id);
            })
            ->count();

        $correlative = str_pad($countDocuments + 1, 15, '0', STR_PAD_LEFT);

        return "DTE-{$dataDteType->goes_id}-{$codeSubsidiary}{$codeSalePoint}-{$correlative}";
    }

    private static function copyStepsByDteType($dte)
    {
        $stepsIds = $dte->dteType()->first()->steps()->pluck('id');

        if ($dte->steps()->exists()) {
            $dte->steps()->wherePivot('complete', false)->detach();
            $completeStepIds = $dte->steps()->pluck('id');

            $stepsIds = $stepsIds->diff($completeStepIds);
        }

        $dte->steps()->attach($stepsIds);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($dte) {
            if ($dte->date && !isset(explode(' ', $dte->date)[1])) {
                $dte->date .= ' 08:00:00';
            }

            $dte->date = $dte->date ?? Carbon::now();
            $dte->number_control = $dte->number_control ?? self::generateNumberControl($dte);
            $dte->generate_code = strtoupper(Str::uuid());
        });

        static::created(function ($dte) {
            self::copyStepsByDteType($dte);
        });

        static::updating(function ($dte) {
            $changes = $dte->getDirty();

            if (isset($changes['dte_type_id'])) {
                $dte->dte_type_id = $changes['dte_type_id'];
                $dte->number_control = self::generateNumberControl($dte);

                self::copyStepsByDteType($dte);
            }
        });
    }

    /**
     * calculateDteItemMethods function summary
     *
     * calculateDteItemMethods function long description
     *
     * @param int $var Description
     * @return string
     **/
    private function calculateDteItemMethods(int $receiverEntityType)
    {
        if (
            $this->dte_type_id === 10 ||
            $this->dte_type_id === 11
        ) { #More phantoms Ids
            return $this->attributeTableName[1];
        }

        if ($this->dte_type_id === 9) { #More phantoms Ids
            return $this->attributeTableName[3];
        }

        return $this->attributeTableName[$receiverEntityType];
    }

    /**
     * Hola futuro programador se que me odias, pero al menos dejare algo de documentacion.
     * Despues de pensar decido que el FSEE y CDE que son los totales de los items se guardaran en total_item_no_subject.
     * Su logica es parecida en este momento me parece buena idea... pero veremos que pasa mas tarde...
     */
    public function generateDteItem(Model $productService, $details)
    {
        $ivaItem = 0;
        $unitPrice = $details['unit_price'] ?? $productService->unit_price;
        $saleType = $this->calculateDteItemMethods($this->receiverEntity->saleType->id);

        if ($this->dte_type_id === 1 && $saleType === $this->attributeTableName[3]) {
            $ivaItem = ($productService->PriceWithTributesForFCE($unitPrice) * $details['quantity']) - ($details['discount'] ?? 0);
        }

        $basePriceForItem = ($unitPrice * $details['quantity']) - ($details['discount'] ?? 0);

        return [
            $saleType => $basePriceForItem,
            'unit_price' => $unitPrice,
            'related_document_id' => $details['related_document_id'] ?? null,
            'iva_item' => $ivaItem,
        ];
    }

    /**
     * createRelatedDteBySelfDte function summary
     *
     * createRelatedDteBySelfDte function long description
     *
     * @param Type $var Description
     * @return RelatedDocument
     * #TODO: heavy logic to add or not add generate code
     **/
    public function createRelatedDteBySelfDte(int $dteId, bool $addItems = true): RelatedDocument
    {
        $olderDte = $this::find($dteId)->load('dteItems');

        $relatedDocument = $this->relatedDocuments()->create([
            'main_dte_id' => $olderDte->id,
            'dte_type_id' => $olderDte->dte_type_id,
            'generation_type_id' => ExternalService::getDefaultIdByExternalModel('generation_types'),
            'identificator_document' => $olderDte->generate_code,
            'date' => $olderDte->date,
        ]);

        if ($addItems && in_array($this->dte_type_id, [1, 2, 4, 5])) {
            if (count($olderDte->dteItems) === 0) {
                throw new CustomHttpException('No hay items validos en el documento a relacionar');
            }

            foreach ($olderDte->dteItems as $dteItem) {
                $this->dteItems()->create(
                    array_merge(
                        ['related_document_id' => $relatedDocument->id],
                        collect($dteItem)->only([
                            'product_service_id',
                            'description',
                            'quantity',
                            'unit_price',
                            'total_item_no_subject',
                            'total_item_exempt',
                            'total_item',
                            'discount',
                        ])->toArray()
                    )
                );
            }
        }

        return $relatedDocument;
    }

    /**
     * getGenerateDate function summary
     *
     * getGenerateDate function long description
     *
     * @return String
     **/
    public function getGenerateDate()
    {
        return Carbon::parse($this->date)->format('Y-m-d');
    }

    /**
     * getGenerateHour function summary
     *
     * getGenerateHour function long description
     *
     * @return String
     **/
    public function getGenerateHour()
    {
        return Carbon::parse($this->date)->format('H:i:s');
    }

    /**
     * getEmitterEntity function summary
     *
     * getEmitterEntity function long description
     *
     * @return
     **/
    public function getEmitterEntity()
    {
        $this->load([
            'salePoint.subsidiary.emitterEntity',
        ]);

        return $this->salePoint->subsidiary->emitterEntity;
    }

    /**
     * itemTypeExportation function summary
     *
     * itemTypeExportation function long description
     *
     * @return type
     * @throws conditon
     **/
    public function itemTypeExportation()
    {
        return $this->dteItems()
            ->join(Efac::$productServicesTable, 'dte_items.product_service_id', '=', Efac::$productServicesTable . '.id')
            ->select(Efac::$productServicesTable. '.item_type_id')
            ->groupBy(Efac::$productServicesTable. '.item_type_id')
            ->get()
            ->sum('item_type_id');
    }

    /**
     * loadBaseRelations function summary
     *
     * loadBaseRelations function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function loadBaseRelations(array $aditionalRelation = array())
    {
        $this->load(array_merge([
            # Identification relantionship
            'dteType',
            'modelType',
            'operationType',
            'operationCondition',
            'user',
            'contingency.contingencyType',
            # Emmitter Relationships
            'salePoint.subsidiary' => function ($query) {
                $query->with([
                    'establishmentType',
                    'city.department',
                    'emitterEntity.entity' => function ($query) {
                        $query->with([
                            'city' => function ($query) {
                                $query->with([
                                    'department',
                                    'state',
                                ]);
                            },
                            'economicActivity',
                            'docClientTypes',
                            'phones',
                        ]);
                    },
                ]);
            },
            # Receiver Relantionships
            'receiverEntity.entity' => function ($query) {
                $query->with([
                    'city' => function ($query) {
                        $query->with([
                            'department',
                            'state',
                        ]);
                    },
                    'economicActivity',
                    'docClientTypes',
                    'phones',
                ]);
            },
            # Body Relantionships
            'dteItems' => function ($query) {
                $query->with([
                    'productService' => function ($query) {
                        $query->with([
                            'itemType',
                            'measureUnit',
                        ]);
                    },
                    'relatedDocument' => function ($query) {
                        $query->with([
                            'dteType',
                            'generationType',
                        ]);
                    },
                ]);
            },
            #Summary relantionship
            'summary',
            'appendices',
            #STOP PLS
        ], $aditionalRelation));
    }

    /**
     * dispatchJobToMakeToken function summary
     *
     * dispatchJobToMakeToken function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function dispatchJobToMakeToken()
    {
        $this->status = StatusEnum::Processing->value;
        $this->save();

        try {
            $this->makeJsonTokensJobs[$this->dte_type_id]::dispatchSync($this);
        } catch (FailedSendException $e) {
            $e->report();
            throw new CustomHttpException('El documento dio error al procesar en el Ministerio de Hacienda', 409, DteTokenResource::make($this->tokens()->latest()->first()));
        } catch (\ErrorException $e) {
            throw new CustomHttpException('Error inesperado durante el envio del documento al Ministerio de Hacienda', 409, $e->getMessage());
        }
    }

    /**
     * updateCompleteStep function summary
     *
     * updateCompleteStep function long description
     *
     * @param Type $var Description
     **/
    public function updateCompleteStep(string $slug)
    {
        $this->steps()->where('slug', $slug)->update(['dte_step.complete' => 1]);
    }

    /**
     * Get the entity that owns the Dte
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'entity_id', 'id');
    }

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }
}
