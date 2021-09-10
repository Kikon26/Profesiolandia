<?php
$im = imagegrabscreen();
imagepng($im, "mi_captura_de_pantalla.png");
imagedestroy($im);
?>