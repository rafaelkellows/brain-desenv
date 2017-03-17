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
            /************ ADM User ************/
            if( $usuario->getType() == 1){
              $oSlct = $oConn->SQLselector("*","tbl_links","","created desc"); 
              $rowL = mysql_num_rows($oSlct);
              if($rowL) {
                echo '<ul class="downs">';
                while ( $row = mysql_fetch_array($oSlct) ) {
                  echo '<li>';
                  echo '  <a href="'.$row['short_link'].'" target="_blank"><em>'.$row['id_link'].'</em><span>'.$row['title'].'</span><i title="" class="fa fa-download" aria-hidden="true"></i></a>';
                  $usrSlct = $oConn->SQLselector("name","tbl_users",'"'.$row['user_id'].'"',"");
                  $urow = mysql_fetch_array($usrSlct);
                  $date = date_create($row['created']);
                  echo '  <span>By '.$urow['name'].' <br>At '.date_format($date, 'd/m/Y') . ' ' .date_format($date, 'G:i a')  . '<br>Max. <font style="color:#ff6600">'.$row['tries'].'</font> downs by user <br>Times Downloaded: <font style="color:#ff6600">'.$row['downs'].'</font></span>';
                  echo '</li>';
                }
                echo '</ul>';
              }else{
                echo "<ul class='downs'><li>Theresn't any file registered.</li></ul>";
              }
            /************ DEFAULT User ************/
            }else{
              $oSlct = $oConn->SQLselector("*","tbl_usr_downloads","user_id='".$usuario->getId()."'","created desc"); // AND active = 1
              $rowUD = mysql_num_rows($oSlct);

              if($rowUD) {
                echo '<ul class="downs">';
                $fcounter=1;
                while ( $row = mysql_fetch_assoc($oSlct) ) {
                  // Get Download Infos
                  $oDown = $oConn->SQLselector("*","tbl_links","id_link='".$row['id_link']."'","created desc");
                  $rowD = mysql_fetch_assoc($oDown);
                  // Get Total Downloaded infos
                  $oSlctDowns = $oConn->SQLselector("count(*)","tbl_links_downloaded","id_link='".$row['id_link']."'","");
                  $rowSD = mysql_fetch_array($oSlctDowns);
                  // Take total times downloaded
                  if($rowSD){
                    $downloaded = $rowSD[0];
                  }else{
                    $downloaded = '0';
                  }
                  //array_push($arr_downloads,$row['id_link']);
                  if ($row['downloaded'] == '0'){
                    echo '<li>';
                    echo '  <a href="'.$row['short_link'].'"><em>'.$row['id_down'].'</em><span>'.$rowD['title'].'</span><i title="" class="fa fa-download" aria-hidden="true"></i></a>';
                    echo '  <span>Times Downloaded: <font style="color:#ff6600">'.$downloaded.'</font>.<br>Rest <font style="color:#ff6600;">'.($rowD['tries']-$downloaded).' </font> from <font style="color:#ff6600; font-size:18px;">'.$rowD['tries'].'</font> tries.</span>';
                    echo '</li>';
                  }else{
                    $oSlctDowns2 = $oConn->SQLselector("count(*)","tbl_usr_downloads","id_link='".$row['id_link']."'","");
                    $rowSD2 = mysql_fetch_array($oSlctDowns2);
                    // Take total times downloaded
                    if($rowSD2){
                      $files = $rowSD2[0];
                    }else{
                      $files = '0';
                    }

                    $oSlctDowns3 = $oConn->SQLselector("count(*)","tbl_usr_downloads","id_link='".$row['id_link']."' AND downloaded =1 ","");
                    $rowSD3 = mysql_fetch_array($oSlctDowns3);
                    // Take total times downloaded
                    if($rowSD3){
                      $tfilesdown = $rowSD3[0];
                    }else{
                      $tfilesdown = '0';
                    }

                    //echo $files. ' -- ' . $tfilesdown;
                    $date = date_create($row['modified']);
                    if($files <= 1){
                      echo '<li>';
                      echo '  <a href="javascript:void(0);" target="_blank"><em>'.$row['id_down'].'</em><span>'.$rowD['title'].'<br><font style="color:#ff1100; font-size:16px;">Expirou em '.date_format($date, 'd/m/y') . ' ' .date_format($date, 'G:i   a').'</font></span><i title="" class="fa fa-exclamation-triangle" aria-hidden="true"></i></a>';
                      echo '  <span>Times Downloaded: <font style="color:#ff6600">'.$downloaded.'</font>.<br>Rest <font style="color:#ff6600;">'.($rowD['tries']-$downloaded).' </font> from <font style="color:#ff6600; font-size:18px;">'.$rowD['tries'].'</font> tries.</span>';
                      echo '  <a class="regenerate" href="regenerate_link.php?d='.$row['id_link'].'">Gerar novo link</a>';
                      echo '</li>';  
                    }else{
                      if($fcounter==1){
                        if( $files == $tfilesdown ){
                          echo '<li>';
                          echo '  <a href="javascript:void(0);" target="_blank"><em>'.$row['id_down'].'</em><span>'.$rowD['title'].'<br><font style="color:#ff1100; font-size:16px;">Expirou em '.date_format($date, 'd/m/y') . ' ' .date_format($date, 'G:i   a').'</font></span><i title="" class="fa fa-exclamation-triangle" aria-hidden="true"></i></a>';
                          if($downloaded < $rowD['tries']){
                            echo '  <span>Times Downloaded: <font style="color:#ff6600">'.$downloaded.'</font>.<br>Rest <font style="color:#ff6600;">'.($rowD['tries']-$downloaded).' </font> from <font style="color:#ff6600; font-size:18px;">'.$rowD['tries'].'</font> tries.</span>';
                            echo '  <a class="regenerate" href="regenerate_link.php?d='.$row['id_link'].'">Gerar novo link</a>';
                          }else{
                            echo '  <span>Sorry, you have used all the limits of this file.</span>';
                          }
                          echo '</li>';                    
                          $fcounter = $files;
                        }
                      }
                    }
                  }
                }
                //print_r(array_values($arr_downloads));
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