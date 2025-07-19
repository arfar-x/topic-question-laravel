<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database by running each module's seeder.
     *
     * @throws Exception
     */
    public function run(): void
    {
        $this->call([
            TopicSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}
