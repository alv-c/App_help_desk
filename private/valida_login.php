<?php
    session_start();

    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;
    
    //usuarios do sistema
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '12345', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '333222', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '121212', 'perfil_id' => 2),
    );

    foreach($usuarios_app as $usuario) {
        if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $usuario['id'];
            $usuario_perfil_id = $usuario['perfil_id'];
        }
    }

    if($usuario_autenticado) {
        $_SESSION['autenticado'] = true;
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = false;
        header('Location: index.php?login=false');
    }