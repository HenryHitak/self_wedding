<?php
     // function to open the file and write
    function mkFile($fileAddr,$data){
        $fileHandler = fopen($fileAddr,'w') or die("Unable to create the file");
        fwrite($fileHandler,$data);
        fclose($fileHandler);
    }
    $fileAddr = "./dir";
    $file = './img/snap';
    $file1 = './img/gallery';
    $fileDir = scandir($file);
    $fileDir1 = scandir($file1);
    $fileArray = [];
    $fileArray1 = [];
    foreach($fileDir as $fileName){
        if($fileName=="." || $fileName==".."){
            continue;
        }
        array_push($fileArray,$file."/".$fileName);
    }
    foreach($fileDir1 as $fileName){
        if($fileName=="." || $fileName==".."){
            continue;
        }
        array_push($fileArray1,$file1."/".$fileName);
    }
    $fileData = json_encode($fileArray);
    $fileData1 = json_encode($fileArray1);
    if(file_exists($fileAddr)){
        mkFile($fileAddr."/snapImg.txt",$fileData);
        mkFile($fileAddr."/galleryImg.txt",$fileData1);
        echo "Create the file success.";
    }else{
        echo "Error creating the file.";
    }
?>