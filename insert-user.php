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
        <form method="post" id="formUsers">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" value="Fábio">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="email" value="fabiosantos@gmail.com">
            </div>
            <div class="mb-3">
                <label for="passw" class="form-label">Senha</label>
                <input type="text" name="passw" class="form-control" id="passw" value="2134567">
            </div>
            <button type="submit" class="btn btn-primary">Envia</button>
        </form>
    </div>
    <div class="row">
        <div class="alert alert-success" role="alert" id="retorno">
        </div>
    </div>
</div>
<script type="text/javascript" async>
    const formUsers = document.querySelector("#formUsers");
    const retorno = document.querySelector("#retorno");
    formUsers.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUsers = new FormData(formUsers);
        const dados = await fetch("users/insert.php",{
            method: "POST",
            body: dataUsers,
        });
        const user = await dados.json();
        retorno.innerHTML = `Nome ${user.name} Email: ${user.email} Senha: ${user.passw}`;
    });
</script>
</body>
</html>