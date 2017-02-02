<?php
require_once 'syslogin/connector.php';
if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK){
    ############ Edit settings ##############
    $oConn = New Conn();
    $UploadDirectory    = 'uploads/'; //specify upload directory ends with / (slash)
    $id = $_REQUEST["uid"];
    $title = $_REQUEST["title"];
    $tries = $_REQUEST["tries"];
    ##########################################
    
    /*
    Note : You will run into errors or blank page if "memory_limit" or "upload_max_filesize" is set to low in "php.ini". 
    Open "php.ini" file, and search for "memory_limit" or "upload_max_filesize" limit 
    and set them adequately, also check "post_max_size".
    */
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
    
    $File_Name          = strtolower($_FILES['FileInput']['name']);
    $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
    $Random_Number      = rand(0, 9999999999); //Random number to be added to name 
    $Random_Number =  md5($Random_Number);
    $now = new DateTime();
    $dateSR = str_replace('-','_',$now->format('d-m-Y H:i:s'));
    $dateSR = str_replace(' ','_',$dateSR);
    $dateSR = str_replace(':','_',$dateSR);

    mkdir($UploadDirectory.$Random_Number);
    $NewFileName = $dateSR.$File_Ext; //new file name
    
    if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$Random_Number.'/'.$NewFileName )){
        $fullPathName = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI']).'/'.$UploadDirectory.$Random_Number.'/'.$NewFileName;
        $shortPathName = 'http://'.$_SERVER['SERVER_NAME'].'/?d='.substr(md5($Random_Number),1,8);
        
        $all = $oConn->SQLinserter("tbl_links","user_id,title,full_link,short_link,tries,created","'$id','$title','$fullPathName','$shortPathName','$tries',now()");
        if($all){
            die('<p class="ok"><strong>'.$title.'</strong><br>foi enviado com Sucesso! <br>Copie e envie o link abaixo para os usuários pré-cadastrados:<br><input style="text-align:center" type="text" value="'.$shortPathName.'" /><br></p>');
        }
        else{
            die('<p class="error">O Upload falhou! Tente novamente.</p>');
        }
        // do other stuff 
    }else{
        die('<p class="error">Erro ao subir o arquivo. Tente novamente!</p>');
    }
}else{
  die('<p class="error">O Upload falhou! Tente novamente.</p>');
}