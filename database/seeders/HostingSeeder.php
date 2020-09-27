<?php

namespace Database\Seeders;

use App\Models\Hosting;

use Illuminate\Database\Seeder;

class HostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hosting::factory(50)->create();
    }
}
