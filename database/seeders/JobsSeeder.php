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
        $created_at = $faker->dateTimeBetween('-1 year', 'now'); // Generate a random date within the last year


        foreach ($userIds as $userId) {
            for ($i = 1; $i <= 3; $i++) {
                $category = $categories[array_rand($categories)];

                // Retrieve a random country name and its ID
                $country = array_rand($countries);
                $countryId = $countries[$country];
                $firstName = $faker->firstName;
                $lastName = $faker->lastName;
                $description = $faker->sentence(50);
                $phone_number = $faker->phoneNumber();



                // Retrieve a random city based on the selected country ID
                $city = DB::table('cities')->where('country_id', $countryId)->pluck('name')->random();

                $price = rand(10, 50); // Random minimum price


                DB::table('jobs')->insert([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'phone' => $phone_number,
                    'address' => '123 Main St',
                    'country' => $country,
                    'city' => $city,
                    'job_title' => $category . ' job' . $i,
                    'description' => $description,
                    'price' => $price,
                    'image_url' => 'https://example.com/' . $lastName . '-image.jpg',
                    'user_id' => $userId,
                    'category_id' => DB::table('categories')->where('name', $category)->value('id'),
                    'created_id' => $created_at
                ]);
            }
        }
    }
}
