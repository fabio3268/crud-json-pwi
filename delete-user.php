<?php
  $stringUsers = file_get_contents(__DIR__ . "/data-json/cadastroUsuarios.json");
  $arrayUsers = json_decode($stringUsers, true);
  var_dump($arrayUsers);