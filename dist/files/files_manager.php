<?php    
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
      }else{
        echo 'arquivo não encontrado!';
        return false;
      }
    }
?>
