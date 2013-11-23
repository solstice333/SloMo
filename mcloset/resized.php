<?php

header('Content-type: image/jpeg');
$file='/var/www/bryanching.net/pics/IMG_20130426_213656.jpg';
#require_once __DIR__ . '/resize.php';
//$tmp = $_FILES['uploadedfile']['tmp_name'];
//resizez($file,1024,720,75);
$image = new Imagick($file);
$image->setImageResolution(72,72); 
$image->scaleImage(1024,1024, true);
$image->writeImage($file); 

// If 0 is provided as a width or height parameter,
// aspect ratio is maintained
//$image->thumbnailImage(1024, 0);
echo $image;
//echo $file;

?>
