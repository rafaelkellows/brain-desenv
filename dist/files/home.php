<?php 
  require_once 'syslogin/usuario.php';
  require_once 'syslogin/autenticador.php'; 
  require_once 'syslogin/sessao.php';
  require_once 'syslogin/connector.php'; 
   
  $aut = AutenticadorBrainvest::instanciar();
   
  $usuario = null;
  if ($aut->esta_logado()) {
    $usuario = $aut->pegar_usuario();
  }
  else {
    $aut->expulsar();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>BRAINVEST - Wealth Management</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="BRAINVEST, Wealth, Management">
    <meta name="keywords" content="Wealth Management, Private Banking, Gestão de Patrimônio, Patrimônio, Finanças, Economia, Poupança, Investimentos, Fundos, Asset Management, Consultoria Financeira, Assessoria Financeira">
    <meta name="author" content="Powered by Liv 360">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font-awesome/font-awesome.min.css">

    <!-- build:css ../css/styles.min.css-->
    <link href="../css/styles_dev.css" rel="stylesheet" media="screen" type='text/css'>
    <!-- endbuild-->

    <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
    <script type='text/javascript' src='../js/jquery.cookie.js'></script>

    <link href="../css/personal/stylesheet.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" type="image/icon" href="favicon.ico">
  </head>
  <body>    
    <main class="files">
      <?php include 'blockote.php';?>
      <section class="home">
        <h2>Acesso Rápido</h2>
        <nav>
        <?php
          if( $usuario->getType() == 1 ){
        ?>
          <a href="usr_list.php" title="Lista de Usuários"><span><i class="fa fa-list" aria-hidden="true"></i><font>Usuários</font></span></a>
          <a href="usr_create.php" title="Cadastrar Usuário"><span><i class="fa fa-user-plus" aria-hidden="true"></i><font>Cadastrar</font></span></a>
          <a href="usr_upload.php" title="Enviar Arquivo"><span><i class="fa fa-upload" aria-hidden="true"></i><font>Enviar</font></span></a>
          <a href="usr_downloads.php" title="Arquivos Enviados"><span><i class="fa fa-download" aria-hidden="true"></i><font>Downloads</font></span></a>
        <?php
          }else{
        ?>
          <a href="usr_create.php?nvg=user&uid=<?php print $usuario->getId(); ?>" title="Cadastrar Usuário"><span><i class="fa fa-user" aria-hidden="true"></i><font>Meu Perfil</font></span></a>
          <a href="usr_downloads.php" title="Arquivos Enviados"><span><i class="fa fa-download" aria-hidden="true"></i><font>Downloads</font></span></a>
        <?php
          }
        ?>
        </nav>
      </section>
        
    </main>
  </body>
</html>