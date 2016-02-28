<?php

require dirname(__DIR__) .'/vendor/autoload.php';

$faker = Faker\Factory::create();
$faker->addProvider(new BlogArticleFaker\FakerProvider($faker));

$i = 0;

while ($i < 20) {
    $name = $faker->articleTitle;

    echo "\n", $name;
    $i++;
}

echo "\n";