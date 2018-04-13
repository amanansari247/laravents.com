<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meetup::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 20),
        'is_approved' => true,
        'title' => 'Vehicula Fermentum',
        'website' => 'https://lorem.de',
        'meetup_url' =>'https://lorem.de',
        'description' => 'Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.

Nullam quis risus eget urna mollis ornare vel eu leo. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.

Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Vestibulum id ligula porta felis euismod semper.

Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Curabitur blandit tempus porttitor. Curabitur blandit tempus porttitor.'
    ];
});
