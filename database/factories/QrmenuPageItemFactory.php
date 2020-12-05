<?php

namespace Database\Factories;

use App\Models\QrmenuPageItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class QrmenuPageItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QrmenuPageItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'qrmenu_page_id'    => 1,
            'item_name'         => $this->faker->name,
            'item_desc'         => $this->faker->text,
        ];
    }
}
