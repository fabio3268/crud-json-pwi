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
            <caption>Lista de Médicos</caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CRM</th>
                <th scope="col">Especialidade</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" async>
    const listaDoctors = async (esp) => {
        const tabela = await fetch("doctors/list.php?esp=" + esp);
        const respTabela = await tabela.json();
        console.log(respTabela);
        respTabela.forEach(function (e) {
            console.log(e);
            var table = document.getElementById("myTable");
            var row = table.insertRow(2);
            var cellNum = row.insertCell(0);
            var celName = row.insertCell(1);
            var celCRM = row.insertCell(2);
            var celEsp = row.insertCell(3);
            celName.innerHTML = `${e.name}`;
            celCRM.innerHTML = `${e.CRM}`;
            celEsp.innerHTML = `${e.especialidade}`;
        });
    }
    listaDoctors("Cardiologia");
</script>
</body>
</html>
