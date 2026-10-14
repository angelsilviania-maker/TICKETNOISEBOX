<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Dewa 19',
                'category' => 'Musik',
                'ticket_price' => 250000,
                'description' => 'dewa19 was fun and rock',
                'image' => null,
            ],
            [
                'title' => 'Dewa 19',
                'category' => 'Musik',
                'ticket_price' => 250000,
                'description' => 'dewa19 was fun and rock',
                'image' => null,
            ],
            [
                'title' => 'Dewa 19',
                'category' => 'Musik',
                'ticket_price' => 250000,
                'description' => 'dewa19 was fun and rock',
                'image' => null,
            ],
            [
                'title' => 'Dewa 19',
                'category' => 'Musik',
                'ticket_price' => 250000,
                'description' => 'dewa19 was fun and rock',
                'image' => null,
            ],
            [
                'title' => 'Dewa 19',
                'category' => 'Musik',
                'ticket_price' => 250000,
                'description' => 'dewa19 was fun and rock',
                'image' => null,
            ],
        ];

        foreach ($events as $event) {
                Event::create($event);
        }
    }
}
