<?php
$user = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if($user){
    // Verificar se nome e email foram informados e se o email é válido...
    $user["address"] = ""; // Endereço é informado depois
    $user["phone"] = ""; // Telefone é informado depois
    //var_dump($user);
    $arrayUsers = array();
    // verifica se o json existe
    if(file_exists(__DIR__ . "/../data-json/data-users.json")) {
        $stringUsers = file_get_contents( __DIR__ . "/../data-json/data-users.json");
        $arrayUsers = json_decode($stringUsers, true);
    }
    $arrayUsers[] = $user;
    $usersJson = json_encode($arrayUsers);
    //var_dump($usersJson);
    $file = fopen( __DIR__ . "/../data-json/data-users.json","w+");
    fwrite($file, $usersJson);
    fclose($file);
    echo json_encode($user);
}