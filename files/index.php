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
      // Estabelece conexão com o Servidor
      $pdo = mysql_connect('brainvestfiles.db.2054282.hostedresource.com','brainvestfiles', 'Kellows@Rafael4527') or die ('Falha ao conectar no Servidor!');
      // Define o Banco de Dados
      mysql_select_db('brainvestfiles', $pdo);
      // String de Ação
      $sql = "SELECT *, SUBSTRING(short_link,-8) FROM tbl_links";
      $all =  mysql_query($sql);
      if( $all){
        $row = mysql_fetch_assoc($all);
        header('location: '.$row['full_link']);
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