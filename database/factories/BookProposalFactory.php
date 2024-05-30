<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BookCategory;
use App\Models\BookProposal;
use App\Models\BookPublisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookProposalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookProposal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'category_id' => BookCategory::all()->random()->id,
            'publisher_id' => BookPublisher::factory(),
            'publication_year' => $this->faker->year(),
            'book_title' => $this->faker->sentence(),
            'book_author' => $this->faker->name(),
            'book_cover_path' => null,
            'reason' => $this->faker->paragraph(),
            'book_price' => $this->faker->randomFloat(2, 10, 100),
            'book_type' => $this->faker->randomElement(['softfile', 'hardfile']),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'closed']),

            'created_at' => $this->faker->dateTimeBetween(Carbon::create(2024, 1, 1), Carbon::create(2024, 12, 31)),
        ];
    }
}
