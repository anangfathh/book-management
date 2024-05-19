<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookLoan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookLoanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookLoan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 3),
            'loan_date' => Carbon::now(),
            'deadline_date' => $this->faker->dateTimeBetween('+1 week', '+4 weeks')->format('Y-m-d'),
            'return_date' => null,
            'borrowed_status' => $this->faker->randomElement(['borrowed', 'returned']),
        ];
    }
}
