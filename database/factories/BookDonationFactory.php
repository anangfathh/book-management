<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\BookCategory;
use App\Models\BookDonation;
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
            'user_id' => User::all()->random()->id,
            'book_id' => Book::factory(),
            'jumlah' => $this->faker->numberBetween(1, 3),
            'created_at' => $this->faker->dateTimeBetween(Carbon::create(2024, 1, 1), Carbon::create(2024, 12, 31)),
        ];
    }
}