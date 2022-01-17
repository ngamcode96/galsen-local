<?php
// $files = scandir('https://galsen-local.ngamcode.com/');
$files = glob('uploads/images/amadoungam/11/*.{jpg,png,gif}', GLOB_BRACE);

echo $files[0]

?>