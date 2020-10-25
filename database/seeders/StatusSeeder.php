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
                'name' => 'expired',
                'color' => '#d65959',
            ],
            [
                'name' => 'invoice_sent',
                'color' => '#48a2ca'
            ],
            [
                'name' => 'invoice_settled',
                'color' => '#6a45b8',
            ],
            [
                'name' => 'active',
                'color' => '#2dba34',
            ],
            [
                'name' => 'to_renew_soon',
                'color' => '#e3961e',
            ],
            [
                'name' => 'deleted',
                'color' => '#34495e',
            ],
        ];

        foreach ($statusesInfo as $info) {
            Status::insert([
                'name' => $info['name'],
                'color' => $info['color'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
