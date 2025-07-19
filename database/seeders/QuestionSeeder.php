<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        Topic::all()->each(function ($topic) {
            Question::factory()->count(rand(3, 7))->create([
                'topic_id' => $topic->id,
            ]);
        });
    }
}
