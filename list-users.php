<?php
if(file_exists(__DIR__ . "/data-json/cadastroUsuarios.json")){
    $stringUsers = file_get_contents(__DIR__ . "/data-json/cadastroUsuarios.json");
    //var_dump($stringUsers);
    $arrayUsers = json_decode($stringUsers, true);
    //var_dump($arrayUsers);
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
        <table class="table caption-top" id="myTable">
            <caption>Lista de Usuarários</caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
               <tr>
                 <th scope="row">1</th>
                 <td>...</td>
                 <td>...</td>
                 <td>...</td>
                 <td>...</td>
                 <td>
                   <a href='#'><img src="assets/file.svg"></a>
                   <a href='#'><img src="assets/trash.svg"></a>
                 </td>
               </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" async>
    //const lista = document.querySelector("#lista");
    const listaUsuarios = async (nome) => {
        const tabela = await fetch("users/list.php");
        const respTabela = await tabela.json();
        console.log(respTabela);
        respTabela.forEach(function (e) {
            console.log(e);
            var table = document.getElementById("myTable");
            var row = table.insertRow(2);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);
            cell1.innerHTML = `${e.name}`;
            cell2.innerHTML = `${e.email}`;
        });
    }
    listaUsuarios();
</script>
</body>
</html>
