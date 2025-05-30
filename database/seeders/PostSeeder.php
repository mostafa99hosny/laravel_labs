<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        for ($i = 0; $i < 50; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $faker->randomElement($userIds),

            ]);
        }
    }
}
