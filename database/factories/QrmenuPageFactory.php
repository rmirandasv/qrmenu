<?php

namespace Database\Factories;

use App\Models\QrmenuPage;
use Illuminate\Database\Eloquent\Factories\Factory;

class QrmenuPageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QrmenuPage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'qrmenu_id' => 1,
            'name'      => $this->faker->name
        ];
    }
}
