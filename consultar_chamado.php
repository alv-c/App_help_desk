<?php
require_once "./verificaSessao.php";

$chamados = array();
$arquivo = fopen('./private/arquivo.hd', 'r');
while (!feof($arquivo)) {
    $registro = explode('#', fgets($arquivo));
    if ($_SESSION['perfil_id'] == 2) {
        if (isset($registro[3]) && $_SESSION['id'] != $registro[3]) continue;
    }
    if (count($registro) < 3) continue;
    array_push($chamados, $registro);
}
fclose($arquivo);
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .card-consultar-chamado {
            padding: 30px 0 0 0;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="logoff.php" class="nav-link">Sair</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="card-consultar-chamado">
                <div class="card">
                    <div class="card-header">
                        Consulta de chamado
                    </div>
                    <div class="card-body">
                        <?php foreach ($chamados as $chamado) : ?>
                            <div class="card mb-3 bg-light">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $chamado[0] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado[1] ?></h6>
                                    <p class="card-text"><?= $chamado[2] ?></p>

                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="row mt-5">
                            <div class="col-6">
                                <a class="btn btn-lg btn-warning btn-block" href="./home.php">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>