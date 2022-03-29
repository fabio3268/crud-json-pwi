<?php
if(file_exists(__DIR__ . "/../data-json/data-users.json")){
    $stringUsers = file_get_contents(__DIR__ . "/../data-json/data-users.json");
    echo $stringUsers; // já está em JSON
}