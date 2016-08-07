<?php
/**
 * Created by PhpStorm.
 * User: gkandemir
 * Date: 8.08.2016
 * Time: 00:39
 */


$uploadDir = "uploads/";
$uploadFile = $uploadDir . basename($_FILES["file"]["name"]);

if(move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)){
    echo "Upload İşlemi Basari ile gerceklestirildi";
}else{
    echo "Bir Problem Olustu";
}




?>