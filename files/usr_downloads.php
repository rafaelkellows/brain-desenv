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

    <link href="../css/personal/stylesheet.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="icon" type="image/icon" href="../favicon.ico">
  </head>
  <body>    
    <main class="files">
      <?php include 'blockote.php';?>
      <?php
        $oConn = New Conn();
      ?>
      <form class="login" action="usr_upload_action.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
        <fieldset>
          <legend><i class="fa fa-download" aria-hidden="true"></i> Downloads</legend>
          <!--a href="javascript:window.history.back();" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a-->
          <a href="home.php" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a>
          <?php
            $oSlct = $oConn->SQLselector("*","tbl_links","","created desc"); 
            //if(mysql_fetch_row($oSlct)) {
              echo '<ul class="downs">';
              while ( $row = mysql_fetch_array($oSlct) ) {
                echo '<li>';
                echo '  <a href="'.$row['short_link'].'" target="_blank"><em>'.$row['id_link'].'</em><span>'.$row['title'].'</span><i title="" class="fa fa-download" aria-hidden="true"></i></a>';
                $usrSlct = $oConn->SQLselector("name","tbl_users",'"'.$row['user_id'].'"',"");
                $urow = mysql_fetch_array($usrSlct);
                echo '  <span>By '.$urow['name'].' <br>At '.$row['created'].'</span>';
                echo '</li>';
              }
              echo '</ul>';
            /*/}else{
              echo '<ul class="downs"><li>Nenhum documento cadastrado!</li></ul>';
            }*/
          ?>
        </fieldset>
      </form>
    </main>
  </body>
</html>