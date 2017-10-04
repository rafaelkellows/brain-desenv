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
    // Se na URL consta o id (d) do link 
    if (isset($_REQUEST["d"])) {
      $oConn = New Conn();
      $oSlct = $oConn->SQLselector("*","tbl_usr_downloads","user_id='".$usuario->getId()."'","created desc"); 
      
      if( $oSlct){
        
        while ( $row = mysql_fetch_assoc($oSlct) ) {
          
          if (substr($row['short_link'],-8) == substr($_REQUEST["d"],-8)){
            // se ainda não baixou o arquivo
            if ($row['downloaded'] == '0'){

              $oUpd = $oConn->SQLupdater("tbl_usr_downloads","downloaded = 1, modified = now()","id_down='".$row['id_down']."'");
              $oIns = $oConn->SQLinserter("tbl_links_downloaded","id_link, id_down, created","'".$row['id_link']."','".$row['id_down']."',now()");

              if($oIns){
              
                echo 'Redireciona pra: <br>'.$row['full_link'].' - '.$row['id_down'];
                return;
              
              }
            // se já baixou o arquivo
            }else{
              header('location: usr_downloads.php');
              //echo 'Vc já baixou esse arquivo. Tente baixar com o novo link na tela de Download '. $usuario->getEmail()
            }
            
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