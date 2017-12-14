<?php
$img = imagecreatefrompng('assets/img/pizarron.png');
$color = imagecolorallocate($img, 0, 0, 0);
imagestring($img, 5, 20, 20, 'Hola Mundo!', $color);
header('Content-type: image/png');
imagejpeg($img);
?>