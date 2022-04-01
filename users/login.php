<?php
   session_start();
   $arrayLogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);

   $stringUsers = file_get_contents(__DIR__ . "/../data-json/data-users.json");

   $arrayUsers = json_decode($stringUsers,true);
   $achei = false;
   foreach ($arrayUsers as $user)
   {
      if($arrayLogin["email"] == $user["email"] &&
         $arrayLogin["passw"] == $user["passw"]){
          $achei = true;
          break;
      }
   }
   if($achei == true){
       $user["error"] = 0;
       $_SESSION["user"] = $user;
   } else if($achei == false) {
       $user["error"] = 1;
   }
   echo json_encode($user);