<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jobIds = DB::table('jobs')->pluck('id')->toArray();
        $faker = Faker::create();

        foreach ($jobIds as $jobId) {
            for ($i = 0; $i < 5; $i++) { // create 30 reviews for each job
                $name = $faker->name;
                $email = $faker->email;
                $rating = $faker->numberBetween(1, 10); // generate a random number between 1 and 10
                $comment = $faker->sentence(20);

                DB::table('reviews')->insert([
                    'name' => $name,
                    'email' => $email,
                    'rating' => $rating,
                    'comment' => $comment,
                    'job_id' => $jobId, // use the job id from the jobs table
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}