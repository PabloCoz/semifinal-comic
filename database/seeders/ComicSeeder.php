<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Image;
use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = Comic::factory(20)->create();

        foreach ($comics as $comic) {
            Rating::factory(10)->create([
                'comic_id' => $comic->id,
            ]);

            Chapter::factory(10)->create([
                'comic_id' => $comic->id,
            ]);

            Image::factory(1)->create([
                'imageable_id' => $comic->id,
                'imageable_type' => Comic::class,
            ]);
        }
    }
}
