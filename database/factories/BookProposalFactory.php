<?php

namespace Database\Factories;

use App\Models\BookProposal;
use App\Models\User;
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
            'user_id' => $this->faker->numberBetween(1, 3),
            'category_id' => $this->faker->numberBetween(1, 3),
            'book_title' => $this->faker->sentence(),
            'publisher' => $this->faker->company(),
            'book_author' => $this->faker->name(),
            'book_cover_path' => null,
            'book_description' => $this->faker->paragraph(),
            'book_price' => $this->faker->randomFloat(2, 10, 100),
            'book_type' => $this->faker->randomElement(['softfile', 'hardfile']),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'done']),
        ];
    }
}
