<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::firstOrCreate(['plan_type' => 1], [
            'name' => 'Premium',
            'description' => 'Premium',
            'monthly_cost' => '50',
            'yearly_cost' => '500',
        ]);

        Plan::firstOrCreate(['plan_type' => 2], [
            'name' => 'Free',
            'description' => 'Free',
        ]);
    }
}
