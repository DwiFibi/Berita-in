<?php

// database/factories/AuthorFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'name' => 'Author ' . $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->optional()->paragraph(),
            'profile_image' => $this->faker->optional()->imageUrl(200, 200, 'people'),
        ];
    }
}

