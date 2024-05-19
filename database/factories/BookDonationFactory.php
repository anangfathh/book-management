<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookDonation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookDonationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookDonation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            // 'category_id' => $this->faker->numberBetween(1, 3),
            'book_id' => Book::factory(),
            'jumlah' => $this->faker->numberBetween(1, 3),
        ];
    }
}
