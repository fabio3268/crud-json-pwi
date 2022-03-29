<?php
   $search = filter_input(INPUT_POST,"search");
   if($search){
       //var_dump($search);
       $stringUsers = file_get_contents(__DIR__ . "/data-json/data-users.json");
       $arrayUsers = json_decode($stringUsers, true);

       // entrar em modo de busca
       $achei = false;
       foreach ($arrayUsers as $user){
           if($search == $user["name"]){ // busca exata
           //if(str_contains($user["name"],$search)){ // busca por gragmento
               $achei = true;
               break;
           }
       }
   }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php
include __DIR__ . "/includes/head.php";
?>
<body class="bg-success p-2 text-dark bg-opacity-10">
<?php
include __DIR__ . "/includes/navigator.php";
?>
<div class="container">
    <div class="row">
<?php
   if(!empty($achei)){
       echo "<div class=\"alert alert-success\" role=\"alert\">
                Nome: {$user["name"]} - Email: {$user["email"]} Endereço: {$user["address"]}
             </div>";
   } else {
       echo "<div class=\"alert alert-danger\" role=\"alert\">
                Usuário {$search}, não encontrado!
             </div>";
   }
?>
    </div>
</div>
</body>
</html>