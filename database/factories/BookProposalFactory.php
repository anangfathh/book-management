<?php

namespace Database\Factories;

use App\Models\BookCategory;
use App\Models\User;
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
            'book_description' => $this->faker->paragraph(),
            'book_price' => $this->faker->randomFloat(2, 10, 100),
            'book_type' => $this->faker->randomElement(['softfile', 'hardfile']),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'done']),
        ];
    }
}
