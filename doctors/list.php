<?php
if(file_exists(__DIR__ . "/../data-json/data-doctors.json")){
    $stringDoctors = file_get_contents(__DIR__ . "/../data-json/data-doctors.json");
    echo $stringDoctors; // já está em JSON
}