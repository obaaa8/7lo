<?php 
  // Set the content-type 
  header("Content-type: image/jpeg"); 
   
  // Create the image 
  $im = @imagecreatefromjpeg('GD/image.jpg'); 
   
  // Create some colors 
  $black = imagecolorallocate($im, 116, 60, 36); 
  $blue  = imagecolorallocate($im, 0, 0, 255); 
   
  // Replace by your own font  
  // full path and name 
  $local = $_SERVER['SCRIPT_FILENAME']; 
  $pos   = strrpos($script, '/'); 
  $path  = substr($script, 0, $pos); 
  $font  = $path.'GD/abuhmeda-f2.ttf'; 
   
  // UTF-8 charset 
 

  require('I18N/Arabic.php'); 
  $Arabic = new I18N_Arabic('Glyphs'); 

  
  $text = $Arabic->utf8Glyphs($_GET['name']); 

  

  imagettftext($im, 50, 0, 85, 
          225, $black, $font, $text); 
   
  // Using imagepng() results in clearer  
  // text compared with imagejpeg() 
  imagepng($im); 
  imagedestroy($im); 
?> 