<?php 
    require_once 'syslogin/connector.php';
    $nvg  = $_REQUEST["nvg"];
    $id = $_REQUEST["uid"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $login = $_REQUEST["login"];
    $password = $_REQUEST["password"];
    $type = $_REQUEST["type"];
    $status = $_REQUEST["status"];
    $oConn = New Conn();

    if( 
      $id != '' && $id != NULL && $name != '' && $name != NULL && $email != '' && $email != NULL && $login != '' && $login != NULL && 
      $password != '' && $password != NULL && $type != '' && $type != NULL && $status != '' && $status != NULL && $nvg === 'user'
    ){
      $all = $oConn->SQLupdater("tbl_users","visited = now(), name = '$name', email = '$email', login = '$login', password = '$password', type = '$type', active = '$status'","id_user='".$id."'");
      $row = mysql_fetch_array($all);
      header('location: usr_list.php');

    }else{
      switch ($nvg) {
        case "new_user":
        
          $all = $oConn->SQLselector("*","tbl_users","email='".$email."'");
          
          if( $all){
            $all = $oConn->SQLinserter("tbl_users","name,login,email,password,type,created,visited,active","'$name','$login','$email','$password','$type',now(),now(),'$status'");
            if($all){
              header('location: usr_list.php?msg=1');
            }
            else{
              header('location: usr_create.php?msg=0&name='.$name.'&login='.$login.'&email='.$email.'&password='.md5($password).'&type='.$type.'&status='.$status);
            }
          }else{
            header('location: usr_create.php?&msg=4&name='.$name.'&login='.$login.'&email='.$email.'&password='.md5($password).'&type='.$type.'&status='.$status);
          }
          break;

        case "delete_user":
          
          $all = $oConn->SQLdeleter("tbl_users","id='".$id."'");

          if($all){
            header('location: ../page.php?nvg=user&msg=3');
          }
          else{
            header('location: ../page.php?nvg=user&msg=0');
          }

        default:
          break;
      }
    }
?>