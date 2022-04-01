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
    <div class="row" id="welcomeMessage">

    </div>
</div>
<script type="text/javascript" async>
    const welcome = async () => {
        const message = await fetch("users/welcome.php");
        const userObj = await message.json();
        console.log(userObj);
        var welcomeMessage = document.querySelector("#welcomeMessage");
        welcomeMessage.innerHTML = `Olá, ${userObj.name}!`;
    }
    welcome();
</script>
</body>
</html>
