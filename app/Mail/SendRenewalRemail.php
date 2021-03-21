<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRenewalRemail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Collection */
    private array $affectedHostings;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $affectedHostings)
    {
        $this->affectedHostings = $affectedHostings;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->subject('Hostings renewal reminder')
            ->markdown('emails.hostings_renewal', [
                'affectedHostings' => $this->affectedHostings,
            ]);
    }
}
