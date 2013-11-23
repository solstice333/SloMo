<?php
function resizez($file, $height, $width, $quality){
   $file = "/var/www/bryanching.net/pics/IMG_20130426_213656.jpg"
   $height = 1024;
   $width = 720;
   $quality = 90;
   # Get image width/height to resize properly
   $size = GetImageSize($file);
   $img_width = $size[0];
   $img_height = $size[1];

# In this part, we are calculating proper size for new image
   if ($img_width > $img_height) {
      $new_y = ceil(($width * $img_height) / $img_width);
      $new_x = $height;
   } else {
      $new_y = ceil(($height * $img_width) / $img_height);
      $new_x = $width;
   }

# Create image with properly size for new sized image
   $image_p = imagecreatetruecolor($new_x, $new_y);
   $image = imagecreatefromjpeg($file);
   imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_x, $new_y, $img_width, $img_height);

# finally, outout image file with correct header mime-type
   imagejpeg($image_p, null, $quality);
   Header("Content-type: image/jpeg");
}?>
