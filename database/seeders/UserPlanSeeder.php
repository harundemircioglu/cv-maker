<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'guest@mail.com')->first();

        $plan = Plan::where('plan_type', 1)->first();

        $user->plan()->firstOrCreate([
            'plan_id' => $plan->id,
            'payment_term' => 2,
            'start_date' => now(),
            'end_date' => now()->addYear(),
        ]);
    }
}
