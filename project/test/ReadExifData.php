<?php
$exif_data = exif_read_data('../sample-image-music/9107247204_df0d7288f3_o.jpg');
print_r($exif_data['DateTimeOriginal']);
echo'<br>';
print_r($exif_data['DateTimeDigitized']);


//var_dump($exif_data);