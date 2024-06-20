<?php

namespace Exactum\Efac\Jobs\Document;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ResendExternalMinistryTokenJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dte;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($dte)
    {
        $this->dte = $dte;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->dte->dispatchJobToMakeToken();
    }
}
