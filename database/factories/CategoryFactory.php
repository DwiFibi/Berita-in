<?php

// database/factories/CategoryFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = collect([
            'Teknologi',
            'Olahraga',
            'Hiburan',
            'Ekonomi',
            'Kesehatan',
            'Pendidikan'
        ])->random();

        return [
            'name' => $name,
            'icon' => 'icons/' . Str::slug($name) . '.svg',
            'slug' => Str::slug($name),
            'description' => $name . ' terbaru dan terpercaya',
            'is_active' => true,
        ];
    }
}
