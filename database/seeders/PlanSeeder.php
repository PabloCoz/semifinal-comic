<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Monedas Baps',
            'price' => 3.00,
            'interval' => 'Dias',
            'interval_count' => 1,
            'trial_period_days' => 0,
            'limit' => 4,
            
        ]);

        Plan::create([
            'name' => 'Plan Semanal',
            'price' => 10.00,
            'interval' => 'Semanas',
            'interval_count' => 1,
            'trial_period_days' => 0,
            'limit' => 4,
            
        ]);

        Plan::create([
            'name' => 'Plan Mensual',
            'price' => 30.00,
            'interval' => 'Meses',
            'interval_count' => 1,
            'trial_period_days' => 0,
            'limit' => 4,
            
        ]);
    }
}
