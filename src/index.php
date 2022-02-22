<?php

namespace Campus\UnitTest;

use Faker\Factory as Faker;
use Campus\UnitTest\Models\Room ;

require_once '../vendor/autoload.php';

// // phpinfo();die;

$faker = Faker::create();
$room = new Room(
    $faker->name(),
    $faker->words(20, true)
);

echo $room;
echo 'toto';

// // Code pour redimensionner et afficher une image stockée dans un dossier 
// $image = imagecreatefromjpeg('images/img.jpg');
// $new_image = imagescale($image, 150);
// ob_start();
// imagepng($new_image);
// $rawImageBytes = ob_get_clean();
// echo "<img src='data:image/jpeg;base64," .base64_encode($rawImageBytes) . "' />";