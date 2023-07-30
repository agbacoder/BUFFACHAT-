<?php
spl_autoload_register('fileAutoloader');
function fileAutoloader ($classes) {
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'includes')!== false){
    $path = '../classes/';
} 
else {
    $path = 'classes/';
}

   
    $extension = '.php';
    $filepath = $path .$classes . $extension;

        if (!file_exists($filepath)) {
            return false;
        
    }

   
       

    include $filepath;
}


   

?> 