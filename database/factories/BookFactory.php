<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            // 'user_id' => $this->faker->numberBetween(1, 3),
            'category_id' => $this->faker->numberBetween(1, 3),
            'jenis' => 'hardfile',
            'pdf_path' => null,
            'validation' => 1,
            'image_path' => null,
        ];
    }
}
