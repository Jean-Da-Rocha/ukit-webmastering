<?php

namespace Database\Seeders;

use App\Models\Status;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusesInfo = [
            [
                'status_name' => 'expired',
                'color' => '#d65959',
            ],
            [
                'status_name' => 'invoice_sent',
                'color' => '#48a2ca'
            ],
            [
                'status_name' => 'invoice_settled',
                'color' => '#6a45b8',
            ],
            [
                'status_name' => 'active',
                'color' => '#2dba34',
            ],
            [
                'status_name' => 'to_renew_soon',
                'color' => '#e3961e',
            ],
            [
                'status_name' => 'deleted',
                'color' => '#34495e',
            ],
        ];

        foreach ($statusesInfo as $info) {
            Status::insert([
                'status_name' => $info['status_name'],
                'color' => $info['color'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
