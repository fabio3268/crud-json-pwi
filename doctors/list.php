<?php
$esp = filter_input(INPUT_GET, "esp", FILTER_DEFAULT);

if(file_exists(__DIR__ . "/../data-json/data-doctors.json")){
    $stringDoctors = file_get_contents(__DIR__ . "/../data-json/data-doctors.json");
    $arrayDoctors = json_decode($stringDoctors,true);
    $arrayEsp = array();
    foreach ($arrayDoctors as $doctor){
        if($doctor["especialidade"] == $esp){
            $arrayEsp[] = $doctor;
        }
    }
    if($arrayEsp){
        $stringDoctors = json_encode($arrayEsp);
        echo $stringDoctors; // já está em JSON
    }
}