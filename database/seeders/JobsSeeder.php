<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $userIds = DB::table('users')->pluck('id')->toArray();
        $categories = DB::table('categories')->pluck('name')->toArray();
        $countries = DB::table('countries')->pluck('id', 'name')->toArray();
        $faker = Faker::create();


        foreach ($userIds as $userId) {
            for ($i = 1; $i <= 3; $i++) {
                $category = $categories[array_rand($categories)];

                // Retrieve a random country name and its ID
                $country = array_rand($countries);
                $countryId = $countries[$country];
                $firstName = $faker->firstName;
                $lastName = $faker->lastName;

                // Retrieve a random city based on the selected country ID
                $city = DB::table('cities')->where('country_id', $countryId)->pluck('name')->random();

                $priceMin = rand(1000, 5000); // Random minimum price
                $priceMax = rand($priceMin + 1000, $priceMin + 5000); // Random maximum price

                DB::table('jobs')->insert([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'address' => '123 Main St',
                    'country' => $country,
                    'city' => $city,
                    'job_title' => $category . ' job' . $i,
                    'price_range' => $priceMin . '-' . $priceMax,
                    'image_url' => 'https://example.com/' . $lastName . '-image.jpg',
                    'user_id' => $userId,
                    'category_id' => DB::table('categories')->where('name', $category)->value('id'),
                ]);
            }
        }
    }
}
