<?php

namespace App\Services;

use App\Models\Hosting;
use Illuminate\Database\Eloquent\Collection;

class HostingService
{
    /** @var Collection */
    private Collection $hostings;

    /**
     * Get all hostings that need to be renewed soon.
     *
     * @return array
     */
    public function getAffectedHostings()
    {
        $this->hostings = $this->getHostingsByBillingStatus();

        return $this->hostings->map(function ($hosting) {
            return [
                'id' => $hosting->id,
                'domain' => $hosting->domain_name,
                'daysBeforeRenewal' => diff_in_days($hosting->renewal_date),
            ];
        });
    }

    /**
     * Get all hostings sorted by their billing status.
     *
     * @param  string  $billingStatus
     * @return Collection
     */
    private function getHostingsByBillingStatus(string $billingStatus = 'to_renew_soon')
    {
        return Hosting::select('id', 'domain_name', 'renewal_date', 'billing_status_id')
            ->where('billing_status_id', config("status.{$billingStatus}"))
            ->get();
    }
}
