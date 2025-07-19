<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        Topic::factory()->count(5)->create()->each(function ($rootTopic) {
            Topic::factory()->count(3)->create([
                'parent_id' => $rootTopic->id,
            ])->each(function ($childTopic) {
                Topic::factory()->count(2)->create([
                    'parent_id' => $childTopic->id,
                ]);
            });
        });
    }
}
