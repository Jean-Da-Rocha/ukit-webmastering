<?php

namespace Database\Seeders;

use App\Models\BillingStatus;

use Illuminate\Database\Seeder;

class BillingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusInfo = [
            [
                'name' => 'expired',
                'color' => '#f5365c',
            ],
            [
                'name' => 'invoice_sent',
                'color' => '#1d8cf8'
            ],
            [
                'name' => 'invoice_settled',
                'color' => '#8965e0',
            ],
            [
                'name' => 'active',
                'color' => '#00f2c3',
            ],
            [
                'name' => 'to_renew_soon',
                'color' => '#ff8d72',
            ],
            [
                'name' => 'deleted',
                'color' => '#344675',
            ],
        ];

        foreach ($statusInfo as $info) {
            BillingStatus::insert([
                'name' => $info['name'],
                'color' => $info['color'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
