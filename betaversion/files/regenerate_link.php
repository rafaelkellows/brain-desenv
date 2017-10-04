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

  $fullPathName = '';

  if (isset($_REQUEST['d'])){
    require_once 'files_manager.php';
    $oConn = New Conn();
    $oSlct = $oConn->SQLselector("full_link","tbl_links","id_link=".$_REQUEST['d'],""); 
    $rowL = mysql_num_rows($oSlct);
    if($rowL) {
    ///if($oSlct){
    
      $row = mysql_fetch_assoc($oSlct);
      //echo $row['full_link'];
      //return;
      $_isCopied = setFileNewDir( $row['full_link'] );
      if( $_isCopied ){
        $oConn = New Conn();
        $sql = $oConn->SQLselector("*","tbl_users","email='".strtolower($usuario->getEmail())."'",null);
        $row = mysql_fetch_array($sql);
        //echo $row["id_user"];
        $_uid = $row["id_user"];
        $_llid = $_REQUEST['d'];
        $_fpn = $_isCopied["fullPathName"];
        $_spn = $_isCopied["shortPathName"];
        $all = $oConn->SQLinserter("tbl_usr_downloads","user_id,id_link,full_link,short_link,active,created","'$_uid','$_llid','$_fpn','$_spn','1',now()");
        if($all){
          header('location: usr_downloads.php');
        }
      }

    }else{
      echo 'no_url';
    }
  }
 ?>