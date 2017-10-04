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
      // Estabelece conexão com o Servidor
      //$pdo = mysql_connect('brainvestfiles.db.2054282.hostedresource.com','brainvestfiles', 'Kellows@Rafael4527') or die ('Falha ao conectar no Servidor!');
      //$pdo = mysql_connect('127.0.0.1','root', '') or die ('Falha ao conectar no Servidor!');
      // Define o Banco de Dados
      //mysql_select_db('brainvestfiles', $pdo);
      // String de Ação
      //$sql =  "SELECT * FROM 'tbl_usr_downloads' WHERE user_id='5'";
      //$all =  mysql_query($sql);
      if( $oSlct){
        while ( $row = mysql_fetch_assoc($oSlct) ) {
          //$sql = "SELECT *, RIGHT('short_link', -8) FROM 'tbl_usr_downloads'";
          //$sql =  "SELECT full_link,LOCATE('".substr($_REQUEST["d"],-8)."',short_link) FROM tbl_usr_downloads";
          //$all =  mysql_query($sql);
          //$row = mysql_fetch_assoc($all);
          if (substr($row['short_link'],-8) == substr($_REQUEST["d"],-8)){
            $allD = $oConn->SQLupdater("tbl_usr_downloads","downloaded = 1","id_down='".$row['id_down']."'");
            $rowD = mysql_fetch_array($allD);
            echo 'Redireciona pra: <br>'.$row['full_link'].' - '.$row['id_down'];
            return;
            //header('location: usr_list.php');
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