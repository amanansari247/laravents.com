<?php

use Illuminate\Database\Seeder;

class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conferences = [
            '1' => [
                'title' => 'Laracon US',
                'website' => 'http://laracon.us/'
            ],
            '2' => [
                'title' => 'Laracon EU',
                'website' => 'https://laracon.eu/'
            ],
        ];

        foreach ($conferences as $conference) {
            $created = \App\Models\Conference::create([
                'title' => $conference->title,
                'website' => $conference->website
            ]);
        }
    }
}
