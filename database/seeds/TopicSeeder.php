<?php

use Illuminate\Database\Seeder;

use App\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
          ['name' => 'Sviluppo Front-end'],
          ['name' => 'Sviluppo Back-End'],
          ['name' => 'UX Design'],
          ['name' => 'UI Design'],
          ['name' => 'Deploying']
        ];

        foreach ($topics as $topic) {
          $real_topic = Topic::create($topic);
        }
    }
}
