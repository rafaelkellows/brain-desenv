<?php
session_start();
require_once 'usuario.php';
require_once 'autenticador.php';
require_once 'sessao.php';

 
switch($_REQUEST["submit"]) {
 
    case 'OK': {
 
        # Uso do singleton para instanciar
        # apenas um objeto de autenticação
        # e esconder a classe real de autenticação
        $aut = AutenticadorBrainvest::instanciar();
 
        # efetua o processo de autenticação
        if ($aut->logar($_REQUEST["login"], $_REQUEST["password"])) {
            # redireciona o usuário para dentro do sistema
            header('location: ../home.php');
        }
        else {
            # envia o usuário de volta para 
            # o form de login
            header('location: ../login.php?msg=sair');
        }
 
    } break;
 
    case 'sair': {
 
        # envia o usuário para fora do sistema
        # o form de login
        session_destroy();
        header('location: ../login.php?msg=sair');
 
    } break;

    default: {
        session_destroy(); 
        header('location: ../login.php');
    }
 
}