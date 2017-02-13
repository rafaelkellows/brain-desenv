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
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>BRAINVEST - Wealth Management</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="BRAINVEST, Wealth, Management">
    <meta name="keywords" content="Wealth Management, Private Banking, Gestão de Patrimônio, Patrimônio, Finanças, Economia, Poupança, Investimentos, Fundos, Asset Management, Consultoria Financeira, Assessoria Financeira">
    <meta name="author" content="Powered by Liv 360">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font-awesome/font-awesome.min.css">

    <!-- build:css ../css/styles.min.css-->
    <link href="../css/styles_dev.css" rel="stylesheet" media="screen" type='text/css'>
    <!-- endbuild-->

    <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
    <script type='text/javascript' src='../js/jquery.cookie.js'></script>
    <script type='text/javascript' src='../js/jquery.form.min.js'></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var _ipt_file = $('#FileInput');
        var options = { 
            target:   '#output',   // target element(s) to be updated with server response 
            beforeSubmit:  beforeSubmit,  // pre-submit callback 
            success:       afterSuccess,  // post-submit callback 
            uploadProgress: OnProgress, //upload progress callback 
            resetForm: true        // reset the form after successful submit 
        }; 
                
        function beforeSubmit(){
         //check whether client browser fully supports all File API
          if (window.File && window.FileReader && window.FileList && window.Blob){
            var fsize = _ipt_file[0].files[0].size; //get file size
            var ftype = _ipt_file[0].files[0].type; // get file type
            //allow file types 
            switch(ftype){
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
              $("#output").html("<p class='error'>Tipo de arquivo não suportado!</p>");
              return false;
            }

            //Allowed file size is less than 15 MB (1048576 = 1 mb)
            if(fsize>15728640){
              alert("<b>"+fsize +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
              return false
            }
          }else{
            //Error for older unsupported browsers that doesn't support HTML5 File API
            alert("Please upgrade your browser, because your current browser lacks some new features we need!");
            return false;
          }
        }
        function OnProgress(event, position, total, percentComplete){
          //Progress bar
          $('#progressbox').show();
          $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
          $('#statustxt').html(percentComplete + '%'); //update status text
          if(percentComplete>50){
            $('#statustxt').css('color','#092bd1'); //change status text to white after 50%
          }
        }
        function afterSuccess(data){
          console.log(data);
          $("div.firstStep > *").not('#output').hide().closest('div').removeClass('active');
          _ipt_file.remove();
          $("div.secondStep").addClass('active').fadeIn();
        }
        $('#MyUploadForm').submit(function(e) {
          //e.preventDefault();
          $('#MyUploadForm').find('p.msg').hide();
          if( $("div.firstStep").hasClass('active') ){
            if( $('#MyUploadForm input[name=title]').val() === '' ){
              $('#MyUploadForm').find('p.msg').html('Por favor, defina o Título.').show(),$('#MyUploadForm input[name=title]').focus();
              return false; 
            }
            if( $('#MyUploadForm select[name=tries] option:checked').val() === '0' ){
              $('#MyUploadForm').find('p.msg').html('Por favor, selecione o <br>Limite de Download do arquivo.').show(),$('#MyUploadForm select[name=tries]').focus();
              return false; 
            }
            if(_ipt_file.val().length === 0){
              $('#MyUploadForm').find('p.msg').html('Por favor, selecione o arquivo.').show(),_ipt_file.focus();
              return false; 
            }
            $(this).ajaxSubmit(options);
            return false; 
          }else if( $("div.secondStep").hasClass('active') ){
              
            var checked = [];
            $("input[name='users_emails[]']:checked").each(function (){
              checked.push( parseInt($(this).val()) );
            });
            if(checked.length > 0){
              $('#MyUploadForm').submit();
            }else{
              $('#MyUploadForm').find('p.msg').html('Por favor, selecione ao menos 1 Usuário.').show();
              return false; 
            }
          }
        });
        $('#MyUploadForm input[name=all_users]').on('click',function(){
          if( $(this).is(':checked') ){
            $('#MyUploadForm input[type=checkbox]').prop('checked',true);
          }else{
            $('#MyUploadForm input[type=checkbox]').prop('checked',false);
          }
        });
      })
    </script>

    <link href="../css/personal/stylesheet.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="icon" type="image/icon" href="../favicon.ico">
  </head>
  <body>    
    <main class="files">
      <?php include 'blockote.php';?>
      <?php
        $oConn = New Conn();
        if ($usuario) {
          $all = $oConn->SQLselector("*","tbl_users","id_user='".$usuario->getId()."'",null);
          $row = mysql_fetch_array($all);
        }
      ?>
      <form class="login" action="usr_upload_action.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
        <fieldset>
          <legend><i class="fa fa-upload" aria-hidden="true"></i> Enviar Arquivo</legend>
          <!--a href="javascript:window.history.back();" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a-->
          <a href="home.php" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a>
          
          <?php if (!isset($_REQUEST["msg"])) { ?>
          <input type="hidden" name="uid" value="<?php print $row["id_user"]; ?>" />
          <p class="msg error">Aqui vem a msg</p>
          <div class="firstStep active">
            <label>Título <small>(descritivo do link)</small>:</label>
            <input type="text" name="title" value="" />
            <label>Limite: <small>(tentativas de downs por Usuário )</small>:</label>
            <select name="tries">
              <option checked="checked" value="0">0x</option>
              <option value="1">1x</option>
              <option value="2">2x</option>
              <option value="3">3x</option>
              <option value="4">4x</option>
              <option value="5">5x</option>
              <option value="6">6x</option>
              <option value="7">7x</option>
              <option value="8">8x</option>
              <option value="9">9x</option>
              <option value="10">10x</option>
            </select>
            <strong><span>Obs.: o link e o documento passa a não existir mais a cada download que o Usuário realizar evitando o compatilhamento do link. Assim, é gerado um novo link para download dependo do limite estabelecido acima.</span></strong>
            <label>Selecione o arquivo:</label>
            <input type="file" name="FileInput" id="FileInput" value="" />
            <strong><span>Permitido enviar:<br> zip, png, gif, jpeg, doc(x), xls(x) e ppt(x) máx. 15MB</span></strong>
            <span class="msgUploader">... aguarde ...</span>
            <input type="submit" id="submit-btn" value="Upload" />
            <div id="progressbox">
              <div id="progressbar"></div >
              <div id="statustxt">0%</div>
            </div>
            <div id="output"></div>
          </div>
          <div class="secondStep">
            <label>Enviar link do arquivo para:</label>
            <?php
              $oSlct = $oConn->SQLselector("*","tbl_users","active='1'","name"); 
              if ($oSlct) {
                  echo '<label class="checklist"><input type="checkbox" name="all_users" value="all" /> Todos</label>';
                  while ( $row = mysql_fetch_array($oSlct) ) {
                    $usr_status = ($row["active"] == 0) ? 'fa-ban' : 'fa-check' ;
                    $usr_status_title = ($row["active"] == 0) ? 'Inativo' : 'Ativo' ;

                    echo "<label class='checklist'><input type='checkbox' name='users_emails[]' value='".$row["email"]."' /> ".$row["name"].'<i title="'.$usr_status_title.'" class="fa '.$usr_status.'" aria-hidden="true"></i></label>';
                    //echo '<li><a href="usr_create.php?nvg=user&uid='.$row['id_user'].'"><em>'.$row["id_user"].'</em> <span>'.$row["name"].'</span><i title="'.$usr_type_title.'" class="fa '.$usr_type.'" aria-hidden="true"></i>&nbsp;<i title="'.$usr_status_title.'" class="fa '.$usr_status.'" aria-hidden="true"></i></a></li>';
                  }
              }else{
                  "Não há usuário(s) cadastrado(s)!";
              }
            ?>
            <input type="submit" name="ok" value="GO" />
          </div>
          <?php } else { ?>
          <div id="output"><span class="ok">Links para Download <br>enviados com sucesso!</span></div>
          <?php } ?>
        </fieldset>
      </form>
    </main>
  </body>
</html>