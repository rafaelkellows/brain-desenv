<?php 
  session_start();
  session_destroy();
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
    <script type='text/javascript' src='../js/scripts.js'></script>

    <link href="../css/personal/stylesheet.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" type="image/icon" href="favicon.ico">
  </head>
  <body>    
    <main class="files">
      <img src="../images/logo-brainvest-inicio.png" />
      <form class="login" action="syslogin/controle.php" method="post" target="_self">
        <fieldset>
          <legend>Área de Acesso</legend>
          <label>Digite seu usuário/login:</label>
          <input type="text" placeholder="login" name="login" value="" />
          <label>Digite sua senha:</label>
          <input type="password" placeholder="password" name="password" value="" />
          <input type="submit" id="submit" name="submit" value="OK" />
        </fieldset>
      </form>
    </main>
  </body>
</html>