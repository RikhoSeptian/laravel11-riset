<?php

namespace Database\Seeders;

use App\Models\Book;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 5; $i ++) {
            Book::create([
                'title' => $faker->sentence(),
                'author' => $faker->name(),
                'publisher' => $faker->name(),
                'published_date' => Carbon::now(),
                'stock' => $faker->randomNumber(2),
            ]);
        }
    }
}
