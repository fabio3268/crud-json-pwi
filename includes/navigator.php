<?php
    // busca as especialidades em um json
    $stringEsp = file_get_contents(__DIR__ . "/../data-json/data-especialidades.json");
    // transforma em um vetor
    $arrayEsp = json_decode($stringEsp, true);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid bg-success p-2 text-dark bg-opacity-10">
        <a class="navbar-brand" href="index.php">Cadatro Usuários</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuários
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="list-users.php">Lista</a></li>
                        <li><a class="dropdown-item" href="insert-user.php">Incluir</a></li>
                        <!--
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login-user.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">Sair</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="profile.php">Perfil</a>
                </li>
                <!-- -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Médicos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                           // percorre o vetor de especialidades para montar o menu das especialidades
                           // reparem que o link tem um parametro sendo enviado, a especialidade
                           foreach ($arrayEsp as $esp){
                              echo "<li><a class=\"dropdown-item\" href=\"list-doctors.php?esp={$esp["nome"]}\">{$esp["nome"]}</a></li>";
                           }
                        ?>
                    </ul>
                </li>
                <!-- -->
            </ul>
            <form class="d-flex" method="post" action="search-user.php">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>