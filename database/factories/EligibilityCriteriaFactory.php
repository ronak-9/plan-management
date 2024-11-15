<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EligibilityCriteria;
use Illuminate\Database\Eloquent\Factories\Factory;

class EligibilityCriteriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EligibilityCriteria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ageGreaterThan = $this->faker->numberBetween(0, 90);
        $ageLessThan = $this->faker->numberBetween($ageGreaterThan, 90);
        $incomeGreaterThan = $this->faker->numberBetween(0, 100000);
        $incomeLessThan = $this->faker->numberBetween($incomeGreaterThan, 100000);
        $lastLoginDaysAgo = $this->faker->numberBetween(0, 36500);

        return [
            'name' => 'Eligibilty - '.uniqid().' - '.Str::random(15),
            'age_greater_than' => $ageGreaterThan,
            'age_less_than' => $ageLessThan,
            'last_login_days_ago' => $lastLoginDaysAgo,
            'income_greater_than' => $incomeGreaterThan,
            'income_less_than' => $incomeLessThan,
        ];
    }
}
