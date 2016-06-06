<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 33;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('comments')->insert([ //,
                'comments' => $faker->text,
                'user_id' => $faker->randomDigitNotNull,
                'blog_id' => $faker->randomDigitNotNull
            ]);
        }
    }
}
