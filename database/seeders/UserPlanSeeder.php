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
        UserPlan::firstOrCreate(['user_id' => 1, 'plan_id' => 1], []);

        UserPlan::firstOrCreate(['user_id' => 2, 'plan_id' => 2], []);

        UserPlan::firstOrCreate(['user_id' => 3, 'plan_id' => 3], []);
    }
}
