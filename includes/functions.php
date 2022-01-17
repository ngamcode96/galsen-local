<?php
function getOneFileInDirectory($dir, $postion){
    $str = "";
    if($postion == 1){
        $str = "../";
    }else if($position == 2){
        $str = "../../";
    }
    $files = glob($str.$dir.'*.{jpg,png,gif}', GLOB_BRACE);
    
    return $files[0];
}
    

?>