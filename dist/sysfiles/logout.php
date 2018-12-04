<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once 'usuario.php';
require_once 'autenticador.php';
require_once 'sessao.php';
$aut = AutenticadorSysFile::instanciar();
$sess = SessaoSysFile::instanciar();
if ($aut->esta_logado()) {
    $sess->set('usuario', 0);
  	session_write_close();
    $aut->expulsar();
    header('location: ../../');
  }
?>
