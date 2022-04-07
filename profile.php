<?php
    session_start();
    if(!empty($_SESSION["user"])){
        $user = $_SESSION["user"];
        //var_dump($user);
    } else {
        header("Location:index.php");
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
    <div class="row" id="welcomeMessage">

    </div>
</div>
<div class="container">
    <div class="row">
        <form method="post" id="formUsers">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" value="<?=$user["name"]; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="email" value="<?=$user["email"]; ?>">
            </div>
            <div class="mb-3">
                <label for="passw" class="form-label">Senha</label>
                <input type="text" name="passw" class="form-control" id="passw" value="">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" name="address" class="form-control" id="address" value="<?=$user["address"];?>"
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="<?=$user["phone"];?>">
            </div>
            <button type="submit" class="btn btn-primary">Envia</button>
        </form>
    </div>
    <div class="row">
        <div role="alert" id="retorno">
        </div>
    </div>
</div>
<script type="text/javascript" async>
    const welcome = async () => {
        const message = await fetch("users/welcome.php");
        const userObj = await message.json();
        var welcomeMessage = document.querySelector("#welcomeMessage");
        welcomeMessage.innerHTML = `Olá, ${userObj.name}!`;
    }
    welcome();

    // UPDATE das Informações do Usuário

    const formUsers = document.querySelector("#formUsers");
    const retorno = document.querySelector("#retorno");
    formUsers.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUsers = new FormData(formUsers);
        const dados = await fetch("users/update.php",{
            method: "POST",
            body: dataUsers,
        });
        const user = await dados.json();
        console.log(user);
        const retorno = document.querySelector("#retorno");

        retorno.classList.add("alert");
        if(user.error == 1){
            retorno.classList.remove("alert-success");
            retorno.classList.add("alert-danger");
            retorno.innerHTML = "Email e/ou Senha inválidos!";
        } else if(user.error == 0) {
            retorno.classList.remove("alert-danger");
            retorno.classList.add("alert-success");
            retorno.innerHTML = `${user.name}, seus dados foram atualizados!`;
        }
    });
</script>
</body>
</html>