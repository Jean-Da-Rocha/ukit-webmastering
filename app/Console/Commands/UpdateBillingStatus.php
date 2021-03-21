<?php

namespace App\Console\Commands;

use App\Services\HostingService;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateBillingStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:billing_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically update billing status when they reach a certain date.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {
            (new HostingService)->updateBillingStatus();

            $this->info('Hosting billing status successfully updated.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
