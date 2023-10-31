<?php

if(isset($_POST['submit'])){
    
    $newFilename = $_POST['filename'];
    if($_POST['filename']){
        $newFileName = "gallery";

    }else{
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    print_r($file);

}

