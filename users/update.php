<?php
session_start();
$userSearch = $_SESSION["user"];
$userUpdate = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(file_exists(__DIR__ . "/../data-json/data-users.json")){
        $stringUsers = file_get_contents(__DIR__ . "/../data-json/data-users.json");
        $arrayUser = json_decode($stringUsers,true);

        foreach ($arrayUser as $i => $user){
            if($user["email"] == $userSearch["email"]){
                $arrayUser[$i]["name"] = $userUpdate["name"];
                $arrayUser[$i]["email"] = $userUpdate["email"];
                $arrayUser[$i]["address"] = $userUpdate["address"];
                $arrayUser[$i]["phone"] = $userUpdate["phone"];
                $userUpdate["error"] = 0;
                $_SESSION["user"] = $userUpdate;
                break;
            }
        }
        $usersJson = json_encode($arrayUser);
        $file = fopen( __DIR__ . "/../data-json/data-users.json","w+");
        fwrite($file, $usersJson);
        fclose($file);
    }

    //echo $userUpdate["name"] . " - " . $userUpdate["email"];

    echo json_encode($userUpdate);
