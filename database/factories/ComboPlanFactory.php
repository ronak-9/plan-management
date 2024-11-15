<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\ComboPlan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComboPlanFactory extends Factory
{
    protected $model = ComboPlan::class;

    public function definition()
    {
        return [
            'name' => 'Combo Plan - '.uniqid().' - '.Str::random(10),
            'price' => $this->faker->randomFloat(2, 10, 1000),  // Random price between 10 and 1000
        ];
    }

    /**
     * Create a ComboPlan with associated plans.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withPlans($planCount = 3)
    {

        return $this->afterCreating(function (ComboPlan $comboPlan) use ($planCount) {

            $plans = Plan::inRandomOrder()->take($planCount)->pluck('id');
            $comboPlan->plans()->sync($plans);
        });
    }
}
