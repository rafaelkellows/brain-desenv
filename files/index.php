<?php 
  require_once 'syslogin/usuario.php';
  require_once 'syslogin/autenticador.php'; 
  require_once 'syslogin/sessao.php';
  require_once 'syslogin/connector.php'; 
   
  $aut = AutenticadorBrainvest::instanciar();
   
  $usuario = null;
  //Se estiver logado o usuário é redirecionado para a tela do arquivo
  if ($aut->esta_logado()) {
    $usuario = $aut->pegar_usuario();
    if (isset($_REQUEST["d"])) {
      $oConn = New Conn();
      $oSlct = $oConn->SQLselector("*","tbl_usr_downloads","user_id='".$usuario->getId()."' AND downloaded = 0","created desc"); 

      if( $oSlct){
        while ( $row = mysql_fetch_assoc($oSlct) ) {

          if (substr($row['short_link'],-8) == substr($_REQUEST["d"],-8)){
            $allD = $oConn->SQLupdater("tbl_usr_downloads","downloaded = 1","id_down='".$row['id_down']."'");
            $rowD = mysql_fetch_array($allD);
            echo 'Redireciona pra: <br>'.$row['full_link'].' - '.$row['id_down'];
            //return;
            //header('location: usr_list.php');
          }else{
            echo 'Vc já baixou esse arquivo. Tente baixar com o novo link na tela de Download'. $usuario->getEmail();
          }
          //header('location: '.$row['full_link']);
        }
      }else{
        echo 'Redireciona: Não pode mais baixar esse arquivo';
      }
    }else{
      session_destroy();
      $aut->expulsar($_REQUEST["d"]);
      //header('location: login.php?d='.$_REQUEST["d"]);
    }
  }
  else {
    session_destroy();
    $aut->expulsar($_REQUEST["d"]);
    //header('location: login.php?d='.$row['full_link']);
  }
?>