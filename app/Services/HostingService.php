<?php

namespace App\Services;

use App\Models\Hosting;

class HostingService
{
    /**
     * Hosting DB columns we want to select.
     *
     * @var array
     */
    private $selectColumns = [
        'id',
        'domain_name',
        'renewal_date',
        'billing_status_id',
    ];

    /**
     * Get all hostings that need to be renewed soon.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAffectedHostings()
    {
        return $this->getHostingsByBillingStatus()
            ->map(function ($hosting) {
                return [
                    'id' => $hosting->id,
                    'domain' => $hosting->domain_name,
                    'daysBeforeRenewal' => diff_in_days($hosting->renewal_date),
                ];
            });
    }

    /**
     * Update the hosting's billing status depending on
     * the days remaining / passed for renewal.
     *
     * @return void
     */
    public function updateBillingStatus()
    {
        $hostings = Hosting::select($this->selectColumns)->get();

        foreach ($hostings as $hosting) {
            if ($this->hasToBeRenewedSoon($hosting)) {
                $hosting->billing_status_id = config('status.to_renew_soon');
                $hosting->save();
            }

            if (
                diff_in_days($hosting->renewal_date) <= 0
                && $hosting->billing_status_id === config('status.to_renew_soon')
            ) {
                $hosting->billing_status_id = config('status.expired');
                $hosting->save();
            }
        }
    }

    /**
     * Check if the provided hosting has to be renew soon.
     *
     * @param  Hosting  $hosting
     * @return bool
     */
    private function hasToBeRenewedSoon(Hosting $hosting)
    {
        return diff_in_days($hosting->renewal_date) >= 1
            && diff_in_days($hosting->renewal_date) <= 60
            && $hosting->billing_status_id === config('status.active');
    }

    /**
     * Get all hostings sorted by their billing status.
     *
     * @param  string  $billingStatus
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getHostingsByBillingStatus(string $billingStatus = 'to_renew_soon')
    {
        return Hosting::select($this->selectColumns)
            ->where('billing_status_id', config("status.{$billingStatus}"))
            ->get();
    }
}
