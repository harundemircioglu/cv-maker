<?php

namespace Database\Seeders;

use App\Models\UserPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPlan::firstOrCreate(['user_id' => 3, 'plan_id' => 2], [
            'payment_type' => 2,
            'start_date' => now(),
            'end_date' => now()->addYear(),
        ]);
    }
}
