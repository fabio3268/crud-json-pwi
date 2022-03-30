<!DOCTYPE html>
<html lang="pt-BR">
<?php
include __DIR__ . "/includes/head.php";
?>
<body class="bg-success p-2 text-dark bg-opacity-10">
<?php
include __DIR__ . "/includes/navigator.php";
?>
<div class="text-center">
<form class="form-signin" id="formLogin">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input value="fabiosantos@gmail.com" name="email" type="email" id="inputEmail" class="form-control" placeholder="Informe Email..." required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input value="2134567" name="passw" type="password" id="inputPassword" class="form-control" placeholder="Informe Senha..." required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Esqueci minha senha
        </label>
    </div>
    <!--
    retorno da mensagem, se e-mail ou senha incorretos ou
    se usuário conseguiu logar
    class="alert alert-danger"
    class="alert alert-success"
    -->
    <div id="message"  role="alert">
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>
</div>
<script type="text/javascript" async>
    const formLogin = document.querySelector("#formLogin");
    const message = document.querySelector("#message");

    formLogin.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUsers = new FormData(formLogin);
        const dados = await fetch("users/login.php",{
            method: "POST",
            body: dataUsers,
        });
        const user = await dados.json();
        console.log(user);
        message.classList.add("alert");
        if(user.error == 1){
            message.classList.remove("alert-success");
            message.classList.add("alert-danger");
            message.innerHTML = "Email e/ou Senha inválidos!";
        } else if(user.error == 0) {
            message.classList.remove("alert-danger");
            message.classList.add("alert-success");
            message.innerHTML = "Logado!";
        }
        console.log(message);
    });
</script>
</body>
</html>
