<?php 
    date_default_timezone_set("America/Araguaina");
    require_once '../sysfiles/connector.php';
    require_once 'email.php';

    $uToken = ( isset($_REQUEST["t"] ) ) ? $_REQUEST["t"] : '';
    $oConn = New Conn();


    if (isset($uToken)){
      $oSlctUser = $oConn->SQLselector("*","tbl_users","token = '".$uToken."'","");
      $rUser = mysql_num_rows($oSlctUser);
      if($rUser) {
        $rows = mysql_fetch_array($oSlctUser);
        if($rows['active']=='0'){

          $sqlUpdate = $oConn->SQLupdater("tbl_users","modified = now(),active='1'","token='".$uToken."'");
          if($sqlUpdate){
            emailSend('valid',$rows['name'],$rows['email'],$rows['password'],$rows['id'],'');
            header('location: ./?msg=5');
          }else{
            header('location: ./?msg=1');
          }
        }else{
          header('location: ./?msg=6');
        }
      }
    }
?>