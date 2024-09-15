<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quote1 = new Quote();
        $quote1->reason = 'Dolor de muelas';
        $quote1->date_quote = '2024-09-09';
        $quote1->status = 'pending';
        $quote1->user_id = 1;
        $quote1->central_id = 1;
        $quote1->save();

        $quote2 = new Quote();
        $quote2->reason = 'Ortodoncia';
        $quote2->date_quote = '2024-08-09';
        $quote2->status = 'approved';
        $quote2->user_id = 1;
        $quote2->central_id = 2;
        $quote2->save();

        $quote3 = new Quote();
        $quote3->reason = 'Cirugía dental';
        $quote3->date_quote = '2024-10-09';
        $quote3->status = 'active';
        $quote3->user_id = 2;
        $quote3->central_id = 1;
        $quote3->save();

        $quote4 = new Quote();
        $quote4->reason = 'Estética';
        $quote4->date_quote = '2024-11-09';
        $quote4->status = 'pending';
        $quote4->user_id = 2;
        $quote4->central_id = 3;
        $quote4->save();

    }
}
