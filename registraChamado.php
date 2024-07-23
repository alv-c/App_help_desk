<?php
    session_start();

    foreach($_POST as $item) {
        $item = str_replace('#', '-', $item);
    }
    $_POST['id'] = $_SESSION['id'];    
    $texto = implode('#', $_POST);
    $texto = $texto . PHP_EOL;
    $arquivo = fopen('./private/arquivo.hd', 'a');
    fwrite($arquivo, $texto);
    fclose($arquivo);
    header('Location: abrir_chamado.php');
?>