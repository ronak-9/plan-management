<?php

namespace Database\Seeders;

use App\Models\ComboPlan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComboPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComboPlan::factory()
            ->count(25000)
            ->withPlans(rand(2, 3))
            ->create();
    }
}
