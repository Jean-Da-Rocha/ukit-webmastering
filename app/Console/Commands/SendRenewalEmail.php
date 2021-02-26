<?php

namespace App\Console\Commands;

use App\Models\Setting;
use App\Services\HostingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRenewalEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:renewal_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder email with renewal info for each hostings';

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
     * @return int
     */
    public function handle()
    {
        $affectedHostings = (new HostingService)->getAffectedHostings();

        if (Setting::count()) {
            Mail::to(Setting::first()->contact_email)->send(
                new \App\Mail\SendRenewalRemail($affectedHostings)
            );

            $this->info('The email has been successfully sent');
        } else {
            $this->error('No contact email has been found');
        }
    }
}
