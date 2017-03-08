<?php
date_default_timezone_set("America/Araguaina");
require_once 'syslogin/connector.php';
$fullPathName = '';

if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK){
    ############ Edit settings ##############
    $id = $_REQUEST["uid"];
    $title = $_REQUEST["title"];
    $tries = $_REQUEST["tries"];
    $fsize = $_FILES["FileInput"]["size"];
    $Random_Number = rand(0, 9999999999); //Random number to be added to name 
    $UploadDirectory = 'uploads/'; //specify upload directory ends with / (slash)

    //check if this is an ajax request
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
        die();
    }
    
    //Is file size is less than allowed size.
    if ($_FILES["FileInput"]["size"] > 15728640) {
        die("File size is too big!");
    }
    
    //allowed file type Server side check
    switch(strtolower($_FILES['FileInput']['type'])){
      //allowed file types
      //Images
      case 'image/png': 
      case 'image/gif': 
      case 'image/jpeg': 
      /*  
      case 'text/plain':
      case 'text/html': //html file
      */
      //Compressed
      case 'application/x-zip-compressed':
      //PDF
      case 'application/pdf':
      //Word
      case 'application/msword':
      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
      //Excel
      case 'application/vnd.ms-excel':
      case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
      //PowerPoint
      case 'application/vnd.ms-powerpoint':
      case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
      //Video
      case 'video/mp4':
      case 'video/avi':
        break;
      default:
        die('<p class="error">Tipo de arquivo não suportado!</p>'); //output error
    }
    
    $File_Name     = strtolower($_FILES['FileInput']['name']);
    $File_Ext      = substr($File_Name, strrpos($File_Name, '.')); //get file extention
    $Random_Number =  md5($Random_Number);
    $now = new DateTime();
    $dateSR = str_replace('-','_',$now->format('d-m-Y H:i:s'));
    $dateSR = str_replace(' ','_',$dateSR);
    $dateSR = str_replace(':','_',$dateSR);

    mkdir($UploadDirectory.$Random_Number);
    $NewFileName = $dateSR.$File_Ext; //new file name

    if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$Random_Number.'/'.$NewFileName )){
      $fullPathName = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI']).'/'.$UploadDirectory.$Random_Number.'/'.$NewFileName;
      $shortPathName = 'http://'.$_SERVER['SERVER_NAME'].'/files/?d='.substr(md5($Random_Number),1,8);
      $oConn = New Conn();
      $all = $oConn->SQLinserter("tbl_links","user_id,title,full_link,short_link,tries,created","'$id','$title','$fullPathName','','$tries',now()");
      if($all){
        $last_id = mysql_insert_id();  // get last id inserted
        die('<p class="ok"><strong>'.$title.'</strong><br>foi enviado com Sucesso! <br><input type="hidden" name="last_id" value="'.$last_id.'" /><input style="text-align:center; margin-top:5px" name="fpath" type="hidden" value="'.$fullPathName.'" /><input name="fsize" type="hidden" value="'.$fsize.'" /><input name="title" type="hidden" value="'.$title.'" /><input name="tries" type="hidden" value="'.$tries.'" /></p>');
      }
      else{
        die('<p class="error">O Upload falhou! Tente novamente.</p>');
      }
      // do other stuff 
    }else{
      die('<p class="error">Erro ao subir o arquivo. Tente novamente!</p>');
    }
}else{
  if (isset($_POST['users_emails'])){
    function formatSizeUnits($bytes){
      if ($bytes >= 1073741824){
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
      }
      elseif ($bytes >= 1048576){
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
      }
      elseif ($bytes >= 1024){
        $bytes = number_format($bytes / 1024, 2) . ' kB';
      }
      elseif ($bytes > 1){
        $bytes = $bytes . ' bytes';
      }
      elseif ($bytes == 1){
        $bytes = $bytes . ' byte';
      }
      else{
        $bytes = '0 bytes';
      }

      return $bytes;
    }
    function getFileURL(){
      $oConn = New Conn();
      $lid = $_REQUEST['last_id'];
      $oSlct = $oConn->SQLselector("full_link","tbl_links","id_link=".$lid,""); 
      if($oSlct){
        $row = mysql_fetch_assoc($oSlct);
        return $row['full_link'];      
      }else{
        return 'no_url';
      }
    }
    function setFileNewDir($fPath){
      /* -- Copying File */
      $File_Name        = $fPath;
      $File_Ext         = substr($File_Name, strrpos($File_Name, '.')); //get file extention
      $Random_Number    =  md5(rand(0, 9999999999));
      $UploadDirectory  = 'uploads/';
      $now = new DateTime();
      $dateSR = str_replace('-','_',$now->format('d-m-Y H:i:s'));
      $dateSR = str_replace(' ','_',$dateSR);
      $dateSR = str_replace(':','_',$dateSR);


      mkdir($UploadDirectory.$Random_Number);
      $NewFileName = $dateSR.$File_Ext; 
      
      $_from = $File_Name;
      $_to = $UploadDirectory.$Random_Number.'/'.$NewFileName;
      
      if(copy( $_from, $_to )){
      
        $fullPathName = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI']).'/'.$_to;
        $shortPathName = 'http://'.$_SERVER['SERVER_NAME'].'/files/?d='.substr(md5($Random_Number),1,8);
        
        $paths = array("fullPathName" => $fullPathName, "shortPathName" => $shortPathName);
        return $paths;
        /*
        $all = $oConn->SQLinserter("tbl_usr_downloads","user_id,full_link,short_link,active,created","'$id','$title','$fullPathName','','$tries',now()");
        
        if($all){
            die('<p class="ok"><strong>'.$title.'</strong><br>foi enviado com Sucesso! <br><input style="text-align:center; margin-top:5px" name="fpath" type="text" value="'.$shortPathName.'" /><input name="fsize" type="hidden" value="'.$fsize.'" /><input name="title" type="hidden" value="'.$title.'" /><input name="tries" type="hidden" value="'.$tries.'" /><br></p>');
        }
        else{
            die('<p class="error">O Upload falhou! Tente novamente.</p>');
        }*/
      }else{
        return '<p class="error">Erro ao copiar o arquivo. Tente novamente!</p>';
      }
    }
    foreach($_POST['users_emails'] as $user_email){

      $_isCopied = setFileNewDir( getFileURL() );
      if( $_isCopied ){
        //echo 'terei os valores: <br> fPath: '. $_isCopied["fullPathName"].'<br> sPath: '. $_isCopied["shortPathName"];

        $oConn = New Conn();
        $sql = $oConn->SQLselector("*","tbl_users","email='".strtolower($user_email)."'",null);
        $row = mysql_fetch_array($sql);
        echo $row["id_user"];
        $_uid = $row["id_user"];
        $_fpn = $_isCopied["fullPathName"];
        $_spn = $_isCopied["shortPathName"];
        $all = $oConn->SQLinserter("tbl_usr_downloads","user_id,full_link,short_link,active,created","'$_uid','$_fpn','$_spn','1',now()");
        if($all){

          /*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
          $enviaFormularioParaNome = 'Rafael Kellows';
          $enviaFormularioParaEmail = 'rafaelkellows@hotmail.com';
           
          $caixaPostalServidorNome = 'Developer E-mail Account';
          $caixaPostalServidorEmail = 'developer@brainvest.com';
          $caixaPostalServidorSenha = 'ubzYF6!cW';
          /*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
           
          /* abaixo as veriaveis principais, que devem conter em seu formulario*/
          $remetenteNome  = 'Brainvest - Downloads';//$_POST['remetenteNome'];
          $remetenteEmail = strtolower($user_email);//$_POST['remetenteEmail'];
          $assunto  = 'Novo Arquivo disponível';
          //$assunto  = $_POST['assunto'];

          $mensagemConcatenada = '<div style="background-color: #f7f7f7; border:1px solid #EDEDED; padding:30px 10px; text-align:center; font-family: Trebuchet MS, arial; font-size: 16px; line-height: 25px; color:#4c5246">'; 
          $mensagemConcatenada .= ' <a href="http://www.brainvest.com" target="_blank"><img src="http://brainvest.com/images/logo-brainvest-topo.png" alt="Brainvest - Wealth Management" width="250"></a><br/><br/>'; 
          $mensagemConcatenada .= ' <strong style="font-size:18px; color:#ef8000">Novo Download disponível</strong><br/>'; 
          $mensagemConcatenada .= ' <strong>Título:</strong> '.$_REQUEST["title"].'<br/>'; 
          $mensagemConcatenada .= ' <strong>Limite de Downloads:</strong> '.$_REQUEST["tries"].'x<br/>'; 
          $mensagemConcatenada .= ' <strong>Tamanho do Arquivo:</strong> '.formatSizeUnits($_REQUEST["fsize"]).'<br/>';
          $mensagemConcatenada .= ' <strong>Link para Download:</strong> <a href="'.$_isCopied["shortPathName"].'" title="'.$_REQUEST["title"].'">'.$_isCopied["shortPathName"].'</a>';
          $mensagemConcatenada .= '</div>'; 

          //echo utf8_decode($mensagemConcatenada).' - '.$remetenteEmail.'<br>';
          //return false;
          /*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
          //return false;
          require_once('PHPMailer-master/PHPMailerAutoload.php');
           
          $mail = new PHPMailer();
           
          $mail->IsSMTP();
          $mail->SMTPAuth  = false;
          $mail->SMTPSecure = false;
          $mail->Charset   = 'utf8_decode()';
          //$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
          $mail->Host = "relay-hosting.secureserver.net";
          $mail->Port  = '25';
          $mail->Username  = $caixaPostalServidorEmail;
          $mail->Password  = $caixaPostalServidorSenha;
          $mail->From  = $remetenteEmail;
          $mail->FromName  = utf8_decode($remetenteNome);
          $mail->IsHTML(true);
          $mail->WordWrap = 50;
          $mail->Subject  = utf8_decode($assunto);
          $mail->Body  = utf8_decode($mensagemConcatenada);
           
          $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));

          if(!$mail->Send()){
            $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
          }else{
            //header('location: usr_upload.php?msg=1');
            $mensagemRetorno = 'Enviado para: '.$remetenteEmail.'<br>';
          }
          echo $mensagemRetorno;

        }

      }else{
        echo 'não terei os valores';
      }
      return;


    }
  }else{
    die('<p class="error">O Upload falhou! Tente novamente.</p>');  
  }
}