<?php

namespace Exactum\Efac\Http\Resources\External\Token\Cancellation\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class IdentificacionCancellationResource extends JsonResource
{
    /**
     * Tipos de DTE (CAT-002) que SI permiten invalidar en una fecha posterior
     * a la de generacion: Factura (01), Factura de exportacion (11) y Factura
     * de sujeto excluido (14). Para el resto (CCFE, NRE, NCE, NDE, CRE, CLE,
     * DCLE y CDE) Hacienda exige que la fecha/hora del evento sea la MISMA de
     * generacion del DTE; enviar la fecha de hoy provoca el rechazo
     * "[identificacion.fecAnula] DATO NO COINCIDE CON DTE".
     */
    private const LATER_DATE_ALLOWED = ['01', '11', '14'];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $dte = $this->resource->dte;

        $laterDateAllowed = in_array($dte->dteType->goes_id, self::LATER_DATE_ALLOWED, true);

        return [
            'version' => config('efac.cancellation_version'),
            'ambiente' => $dte->ambiente ?? config('efac.external_env'),
            'codigoGeneracion' => $this->resource->generate_code,
            'fecAnula' => $laterDateAllowed
                ? $this->resource->getGenerateDate()
                : $dte->getGenerateDate(),
            'horAnula' => $laterDateAllowed
                ? $this->resource->getGenerateHour()
                : $dte->getGenerateHour(),
        ];
    }
}
