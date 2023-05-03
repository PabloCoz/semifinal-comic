<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Comic;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence();
        $user = User::all()->random()->id;
        $profile = Profile::where('user_id', $user)->exists();
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'slug' => Str::slug($name),
            'user_id' => $user,
            'category_id' => Category::all()->random()->id,
            'status' => $this->faker->randomElement([Comic::ELABORACIÓN, Comic::REVISIÓN, Comic::PUBLICADO]),
            'profile_id' => $profile ? Profile::where('user_id', $user)->first()->id : Profile::factory()->create([
                'user_id' => $user,
            ])->id,
        ];
    }
}
