<?php 
    date_default_timezone_set("America/Araguaina");
    require_once '../sysfiles/connector.php';
    require_once 'email.php';
    $nvg  = $_REQUEST["formType"];
    $date = ( isset($_REQUEST["date"] ) ) ? $_REQUEST["date"] : '' ;
    $title = ( isset($_REQUEST["title"] ) ) ? $_REQUEST["title"] : '';
    $img_path = ( isset($_REQUEST["img_path"] ) ) ? $_REQUEST["img_path"] : '';
    $img_align = ( isset($_REQUEST["img_align"] ) ) ? $_REQUEST["img_align"] : '';
    $text = ( isset($_REQUEST["text"] ) ) ? $_REQUEST["text"] : '';
    $type = ( isset($_REQUEST["type"] ) ) ? $_REQUEST["type"] : '';
    $active = ( isset($_REQUEST["file_status"] ) ) ? $_REQUEST["file_status"] : '';
    $article_link = ( isset($_REQUEST["article_link"] ) ) ? $_REQUEST["article_link"] : '';
    $lnk_from = ( isset($_REQUEST["lnk_from"] ) ) ? $_REQUEST["lnk_from"] : '';
    $complement = ( isset($_REQUEST["complement"] ) ) ? $_REQUEST["complement"] : '';
    //USERS
    $name = ( isset($_REQUEST["name"] ) ) ? $_REQUEST["name"] : '';
    $email = ( isset($_REQUEST["email"] ) ) ? $_REQUEST["email"] : '';
    $password = ( isset($_REQUEST["password"] ) ) ? $_REQUEST["password"] : '';

    if( isset($_REQUEST["new_password"] ) ) {
      $password = $_REQUEST["new_password"];
      echo $password;
    }

    $usr_type = ( isset($_REQUEST["usr_type"] ) ) ? $_REQUEST["usr_type"] : '';
    $usr_status = ( isset($_REQUEST["usr_status"] ) ) ? $_REQUEST["usr_status"] : ''; 
    /**/
    $id = $_REQUEST["uID"];
    $oConn = New Conn();

    switch ($nvg) {
      case "new_item":
        if (isset($type)){
          if($type == 'r'){
            $sqlInsert = $oConn->SQLinserter("tbl_uploads","date,title,img_src,img_align,lnk_from,resume,type,inserted,modified","'$date','$title','$img_path','$img_align','$article_link','$text','$type',now(),now()");
            if($sqlInsert){
              //Get last id inserted
              $sqlSct = $oConn->SQLselector("*","tbl_uploads","","id DESC");
              $row_select = mysql_fetch_array($sqlSct);
              if($row_select){
                  $id = $row_select['id'];
                  $oSlctUser = $oConn->SQLselector("*","tbl_users","active='1'","");
                  $rUser = mysql_num_rows($oSlctUser);
                  if($rUser) {
                    while ( $rowUser = mysql_fetch_array($oSlctUser) ) {
                      emailSend('newarticle',$rowUser['name'],$rowUser['email'],'',$id,'',$complement);
                    }
                  }
              }
              header('location: ./?r='.$id.'&msg=3');
            }else{
              header('location: ./?r='.$id.'&msg=0');
            }
          }
          if($type == 'a'){
            if(!isset($_POST['usr_send'])){
              header('location: ./?a='.$id.'&msg=0');
            }else{
              $sqlInsert = $oConn->SQLinserter("tbl_uploads","date,title,img_src,img_align,lnk_from,resume,type,active,inserted,modified","'','$title','','','$img_path','','$type','1',now(),now()");
              if($sqlInsert){
                //Get last id inserted
                $sqlSct = $oConn->SQLselector("*","tbl_uploads","","id DESC");
                $row_select = mysql_fetch_array($sqlSct);
                if($row_select){
                  $id = $row_select['id'];
                  foreach ($_POST['usr_send'] as $users){
                    $sqlSct = $oConn->SQLselector("*","tbl_usr_upload","id_user = '".$users."' and id_upload = '".$users."'","");
                    $row_select = mysql_fetch_array($sqlSct);
                    if(!$row_select){
                      $sqlInsert = $oConn->SQLinserter("tbl_usr_upload","id_user,id_upload,inserted","'$users','".$id."',now()");
                      $oSlctUser = $oConn->SQLselector("*","tbl_users","id='".$users."'","");
                      $rUser = mysql_num_rows($oSlctUser);
                      if($rUser) {
                          $row = mysql_fetch_array($oSlctUser);
                          if($row){
                            emailSend('newpost',$row['name'],$row['email'],'',$id,'',$complement);
                          }
                      }else{
                         // header('location: ../pt_br/?msg=3');
                      }
                    }
                    else{
                      //header('location: ../pt_br/?msg=3');
                    }
                  }

                  header('location: ../pt_br/?msg=3');

                }
              }else{
                header('location: ./?a='.$id.'&msg=0');
              }
            }
          }
          if($type == 'i'){
            $sqlInsert = $oConn->SQLinserter("tbl_uploads","date,title,img_src,img_align,lnk_from,resume,type,active,inserted,modified","'','$title','','','$img_path','','$type','1',now(),now()");
            if($sqlInsert){
              //Get last id inserted
              header('location: ../pt_br/?msg=3');
              return;
              $sqlSct = $oConn->SQLselector("*","tbl_uploads","","id DESC");
              $row_select = mysql_fetch_array($sqlSct);
              if($row_select){
                $id = $row_select['id'];
                foreach ($_POST['usr_send'] as $users){
                  $sqlSct = $oConn->SQLselector("*","tbl_usr_upload","id_user = '".$users."' and id_upload = '".$users."'","");
                  $row_select = mysql_fetch_array($sqlSct);
                  if(!$row_select){
                    $sqlInsert = $oConn->SQLinserter("tbl_usr_upload","id_user,id_upload,inserted","'$users','".$id."',now()");
                    $oSlctUser = $oConn->SQLselector("*","tbl_users","id='".$users."'","");
                    $rUser = mysql_num_rows($oSlctUser);
                    if($rUser) {
                        $row = mysql_fetch_array($oSlctUser);
                        if($row){
                          emailSend('newpost',$row['name'],$row['email'],'',$id,'',$complement);
                        }
                    }else{
                        header('location: ../pt_br/?msg=3');
                    }
                  }
                  else{
                    header('location: ../pt_br/?msg=3');
                  }
                }
              }
            }else{
              header('location: ./?a='.$id.'&msg=0');
            }
          }
          if($type == 'u'){
            $oSlctUser = $oConn->SQLselector("*","tbl_users","email = '".$email."'","");
            $rUser = mysql_num_rows($oSlctUser);
            if($rUser) {
              header('location: ./?u=new&msg=4');
            }else{
              $Random_Number = rand(0, 9999999999); //Random number to be added to name 
              $uToken =  md5($Random_Number);

              $sqlInsert = $oConn->SQLinserter("tbl_users","name,email,password,type,active,token,inserted,modified,visited","'$name','$email','$password','$usr_type','$usr_status','$uToken',now(),now(),now()");
              if($sqlInsert){
                //Get last id inserted
                $sqlSct = $oConn->SQLselector("*","tbl_users","","id DESC");
                $row_select = mysql_fetch_array($sqlSct);
                if($row_select){
                  $id = $row_select['id'];
                }
                emailSend('welcome',$name,$email,$password,$id,$uToken,$complement);
              }else{
                header('location: ./?u=new&msg=1');
              }
              echo "dont exit() ".$email;
            }
          return;
          }
        }else{
          $uploadPath = 'upload/';
        }
        //$uploadPath = 'upload/'.$_REQUEST["uploadPath"];
      break;
      case "update_item":
        if (isset($type)){
          if($type == 'r'){
            $sqlUpdate = $oConn->SQLupdater("tbl_uploads","modified = now(),date='$date',title='$title',img_src='$img_path',img_align='$img_align',resume='$text',type='$type'","id='".$id."'");
            if($sqlUpdate){
              header('location: ./?r='.$id.'&msg=2');
            }else{
              header('location: ./?r='.$id.'&msg=0');
            }
          }
          if($type == 'a'){
            $sqlUpdate = $oConn->SQLupdater("tbl_uploads","modified = now(),date='',title='$title',img_src='',img_align='',lnk_from='$img_path',resume='',type='a',active='$active'","id='".$id."'");
            if($sqlUpdate){
              header('location: ./?a='.$id.'&msg=2');
            }else{
              header('location: ./?a='.$id.'&msg=0');
            }
          }
          if($type == 'i'){
            $sqlUpdate = $oConn->SQLupdater("tbl_uploads","modified = now(),date='',title='$title',img_src='',img_align='',lnk_from='$img_path',resume='',type='i',active='$active'","id='".$id."'");
            if($sqlUpdate){
              header('location: ./?i='.$id.'&msg=2');
            }else{
              header('location: ./?i='.$id.'&msg=0');
            }
          }
          if($type == 'u'){
            $sqlUpdate = $oConn->SQLupdater("tbl_users","modified = now(),name='$name',email='$email',password='$password',active='$usr_status',type='$usr_type'","id='".$id."'");
            if($sqlUpdate){
              //header('location: ./?msg=2');
              header('location: ./?u='.$id.'&msg=2');
            }else{
              header('location: ./?u='.$id.'&msg=1');
            }
          }
        }
      break;
      case "resend":
        if($type == 'a'){
          if(!isset($_POST['usr_send'])){
            header('location: ./?a='.$id.'&msg=0');
          }else{
            foreach ($_POST['usr_send'] as $users){
              $sqlSct = $oConn->SQLselector("*","tbl_usr_upload","id_user = '".$users."' and id_upload = '".$users."'","");
              $row_select = mysql_fetch_array($sqlSct);
              if(!$row_select){
                $sqlInsert = $oConn->SQLinserter("tbl_usr_upload","id_user,id_upload,inserted","'$users','".$id."',now()");
                $oSlctUser = $oConn->SQLselector("*","tbl_users","id='".$users."'","");
                $rUser = mysql_num_rows($oSlctUser);
                if($rUser) {
                    $row = mysql_fetch_array($oSlctUser);
                    if($row){
                      emailSend('newpost',$row['name'],$row['email'],'',$id,'',$complement);
                    }
                }else{
                   // header('location: ../pt_br/?msg=3');
                }
              }
              else{
                //header('location: ../pt_br/?msg=3');
              }
            }
          }
        }
      break;
      default:
        if($nvg == 'delete'){
          $all = $oConn->SQLdeleter("tbl_uploads","id='".$id."'");
          if($all){
            header('location: ./?msg=5');
          }
          else{
            header('location: ./?msg=2');
          }
        } 
      break;
    }

?>