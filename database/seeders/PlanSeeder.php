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
        $premium = Plan::firstOrCreate(['plan_type' => 1], [
            'name' => 'Premium',
            'description' => 'Premium',
            'monthly_cost' => '50',
            'yearly_cost' => '500',
        ]);

        $premium->features()->firstOrCreate([
            'max_cv_downloads' => 9999,
            'max_work_experiences' => 9999,
            'max_educations' => 9999,
            'max_certificates' => 9999,
            'max_languages' => 9999,
            'max_references' => 9999,
            'max_projects' => 9999,
        ]);

        $free = Plan::firstOrCreate(['plan_type' => 2], [
            'name' => 'Free',
            'description' => 'Free',
        ]);

        $free->features()->firstOrCreate();
    }
}
