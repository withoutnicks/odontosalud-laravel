<?php

namespace Database\Seeders;

use App\Models\Central;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $central1 = new Central();
        $central1->name = 'Central Norte';
        $central1->save();

        $central2 = new Central();
        $central2->name = 'Central Sur';
        $central2->save();

        $central3 = new Central();
        $central3->name = 'Central Lima';
        $central3->save();

        $central4 = new Central();
        $central4->name = 'Central Miraflores';
        $central4->save();

        $central5 = new Central();
        $central5->name = 'Central Callao';
        $central5->save();

        $central6 = new Central();
        $central6->name = 'Central Cajamarca';
        $central6->save();
    }
}
