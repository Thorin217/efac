<?php

namespace Exactum\Efac\Jobs\External\Contingency;

use Exactum\Efac\Enums\PermissionEnum;
use Exactum\Efac\Models\Event\Contingency;
use Exactum\Efac\Models\External\DteType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendDteInContingency implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $mainContingency;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Contingency $mainContingency)
    {
        $this->mainContingency = $mainContingency;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->mainContingency->dtes->map(function ($dte) {
            try {
                $dte->dispatchJobToMakeToken();
            } catch (\Throwable $th) {
                return;
            }
        });

        foreach (DteType::hasContingency()->get() as $contingencyDteType) {
            $contingencyDteType->update(['has_contingency' => 0]);
        }
    }
}
