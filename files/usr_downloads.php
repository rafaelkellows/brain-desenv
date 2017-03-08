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
      <form class="login" action="/" method="post" id="MyUploadForm">
        <fieldset>
          <legend><i class="fa fa-download" aria-hidden="true"></i> Downloads</legend>
          <!--a href="javascript:window.history.back();" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a-->
          <a href="home.php" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a>
          <?php
            if( $usuario->getType() == 1){
              /************ ADM User ************/
              $oSlct = $oConn->SQLselector("*","tbl_links","","created desc"); 
              if($oSlct) {
                echo '<ul class="downs">';
                while ( $row = mysql_fetch_array($oSlct) ) {
                  echo '<li>';
                  echo '  <a href="'.$row['short_link'].'" target="_blank"><em>'.$row['id_link'].'</em><span>'.$row['title'].'</span><i title="" class="fa fa-download" aria-hidden="true"></i></a>';
                  $usrSlct = $oConn->SQLselector("name","tbl_users",'"'.$row['user_id'].'"',"");
                  $urow = mysql_fetch_array($usrSlct);
                  $date = date_create($row['created']);
                  echo '  <span>By '.$urow['name'].' <br>At '.date_format($date, 'd/m/Y') . ' ' .date_format($date, 'G:ia')  . '<br>Max. <font style="color:#ff6600">'.$row['tries'].'</font> downs by user <br>Downloaded <font style="color:#ff6600">'.$row['downs'].'x</font></span>';
                  echo '</li>';
                }
                echo '</ul>';
              }else{
                echo "<ul class='downs'><li>Theresn't any file registered.</li></ul>";
              }
            }else{
              /************ DEFAULT User ************/
              $oSlct = $oConn->SQLselector("*","tbl_usr_downloads","user_id='".$usuario->getId()."'","created desc"); // AND active = 1

              if($oSlct) {
                echo '<ul class="downs">';
                while ( $row = mysql_fetch_assoc($oSlct) ) {
                  // Get Download Infos
                  $oDown = $oConn->SQLselector("*","tbl_links","id_link='".$row['id_link']."'","created desc");
                  $rowD = mysql_fetch_assoc($oDown);
                  echo '<li>';
                  echo '  <a href="'.$row['short_link'].'" target="_blank"><em>'.$row['id_down'].'</em><span>'.$rowD['title'].'</span><i title="" class="fa fa-download" aria-hidden="true"></i></a>';
                  echo '  <span>Times Downloaded: <font style="color:#ff6600">2</font> | Times Rest <font style="color:#ff6600;">1</font> <font style="color:#ff6600; font-size:18px; padding-left:18px; padding-bottom:31px;">['.$rowD['tries'].'x]</font></span>';
                  echo '</li>';
                }
                echo '</ul>';
              }else{
                echo "<ul class='downs'><li>Theresn't any file to download.</li></ul>";
              }
            }
          ?>
        </fieldset>
      </form>
    </main>
  </body>
</html>