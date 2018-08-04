<?php 
    date_default_timezone_set("America/Araguaina");
    require_once '../sysfiles/connector.php'; 
    require_once '../sysfiles/usuario.php';
    require_once '../sysfiles/autenticador.php'; 
    require_once '../sysfiles/sessao.php';
  
    $aut = AutenticadorSysFile::instanciar();
     
    $usuario = null;
    if ($aut->esta_logado()) {
      $usuario = $aut->pegar_usuario();
      $usrtype = $usuario->getType();
      $usrID = $usuario->getType();
    }else{
      $usuario = null;
    }

    $oConn = New Conn();
    $type = ( isset($_REQUEST["f"] ) ) ? $_REQUEST["f"] : '';
    $id = ( isset($_REQUEST["id"] ) ) ? $_REQUEST["id"] : '';
    $upID = ( isset($_REQUEST["upID"] ) ) ? $_REQUEST["upID"] : '';
    
    switch ($type) {
      case "i":
        $sqlInsert = $oConn->SQLinserter("tbl_usr_upload","id_user,id_upload,st_read,inserted","'$usrID','".$id."','1',now()");
        if($sqlInsert){
          echo "ok";
        }else{
          echo "error";
        }
      break;
      case "r":
        $sqlUpdate = $oConn->SQLupdater("tbl_usr_upload","st_read = 1","id_upload='".$id."' and id_user='".$upID."'");
        if($sqlUpdate){
          echo "ok";
        }else{
          echo "error";
        }
      break;
      case "d":
        $sqlDelete = $oConn->SQLdeleter("tbl_usr_upload","id_upload='".$upID."' and id_user='".$id."'");
        if($sqlDelete){
          echo "id_upload='".$upID."' and id_user='".$id."'";
        }else{
          echo "error";
        }
      break;
    }
?>