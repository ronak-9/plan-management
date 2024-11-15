<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EligibilityCriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EligibilityCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EligibilityCriteria::factory(25000)->create();
    }
}
