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
    <script type="text/javascript">
      function Password() {
        var pass = "";
        var chars = 15; //Número de caracteres da senha
        generate = function(chars) {
          for (var i= 0; i < chars; i=i+1){
            pass += this.getRandomChar();
          }
          //document.getElementById("senha").innerHTML( pass );
          if( $("form.login input[name=password]").val() ===  '' ){
            $("form.login input[name=password]").val(pass);
          };          
        }
        this.getRandomChar = function() {
          /*
          * matriz contendo em cada linha indices (inicial e final) da tabela ASCII para retornar alguns caracteres.
          * [48, 57] = numeros;
          * [64, 90] = "@" mais letras maiusculas;
          * [97, 122] = letras minusculas;
          */
          var ascii = [[48, 57],[65,90],[97,122]];
          var i = Math.floor(Math.random()*ascii.length);
          return String.fromCharCode(Math.floor(Math.random()*(ascii[i][1]-ascii[i][0]))+ascii[i][0]);
        }
        generate(chars);
      }
      function LoginName(){
        var _iptName = $('form input[name="name"]'), _iptLogin = $('form input[name="login"]');
        var charsReplacer = function(_input, _output){
          _tmpVal = _input.val();
          _tmpVal = _tmpVal.replace(/[á|ã|â|à]/gi, "a");
          _tmpVal = _tmpVal.replace(/[é|ê|è]/gi, "e");
          _tmpVal = _tmpVal.replace(/[í|ì|î]/gi, "i");
          _tmpVal = _tmpVal.replace(/[õ|ò|ó|ô]/gi, "o");
          _tmpVal = _tmpVal.replace(/[ú|ù|û]/gi, "u");
          _tmpVal = _tmpVal.replace(/[ç]/gi, "c");
          _tmpVal = _tmpVal.replace(/[ñ]/gi, "n");
          _tmpVal = _tmpVal.replace(/[^A-Z0-9]/ig, "");

          _output.val(_tmpVal.toLowerCase() );

        }
        _iptName.keyup(function() {
          //_iptLogin.val(_iptName.val().replace(/[^A-Z0-9]/ig, "").toLowerCase());
          charsReplacer( $(this), _iptLogin );
        });

      }
      function btnsActions(){
        var _btns = $('form span.btns a.fa');
        _btns.click(function(){
          if( $(this).hasClass('fa-trash') ){
            $(this).closest('form').find('input[name=nvg]').val('delete_user');
          }
          $(this).closest('form').submit();
        });
      }
      $(document).ready(function(){
        Password(),LoginName(),btnsActions();
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
        if( isset($_GET["uid"]) ){
          $all = $oConn->SQLselector("*","tbl_users","id_user='".$_GET["uid"]."'",null);
          $row = mysql_fetch_array($all);
          $hiddenVal = 'user'; 
          $titleValue = '<i class="fa fa-user" aria-hidden="true"></i> Alterar ';
          $pswdComplement = '';
        }else{
          $row = Array ( 'id_user' => 0, 'name' => '','email' => '', 'login' => '', 'password' => '', 'type' => -1, 'active' => '' );
          $hiddenVal = 'new_user';
          $titleValue = '<i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar ';
          $pswdComplement = ' <small>(gerada automaticamente)</small>';
        }
      ?>
      <form class="login" action="usr_create_action.php" method="post" target="_self">
        <fieldset>
          <legend><?php print $titleValue; ?> Usuário</legend>
          <!--a href="javascript:window.history.back();" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a-->
          <a href="home.php" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a>
          <input type="hidden" name="nvg" value="<?php print $hiddenVal; ?>" />
          <input type="hidden" name="uid" value="<?php print $row["id_user"]; ?>" />
          <label>Digite o nome:</label>
          <input type="text" placeholder="first/last name" name="name" value="<?php print $row["name"]; ?>" />
          <label>Digite o usuário/login:</label>
          <input type="text" placeholder="login" name="login" value="<?php print $row["login"]; ?>" />
          <label>Digite o e-mail:</label>
          <input type="text" placeholder="email" <?php if( $row['type'] == 0  ) print 'readonly="readonly"'; ?> name="email" value="<?php print $row["email"]; ?>" />
          <label>Senha<?php print $pswdComplement; ?>:</label>
          <input type="text" name="password" <?php if( $usuario->getType() == 1  ) echo 'readonly="readonly"'; ?> value="<?php print $row["password"]; ?>" />
          <!--label>Enviar senha para o usuário?</label>
          <input type="radio" id="usr_delivery" checked="checked" name="delivery" value="0" /><label for="usr_delivery">Não</label>
          <input type="radio" id="adm_delivery" name="delivery" value="1" /><label for="adm_delivery">Sim</label-->
          <label>Tipo de Acesso: <?php if( $row['type'] == 0  ) print '<small>Usuário</small>'; ?></label>
          <?php 
            if( $row['type'] != 0 ){ 
          ?>
          <input type="radio" id="usr_type" <?php if( $row['type'] != 1 ) print 'checked="checked" '; ?> name="type" value="0" /><label for="usr_type">Usuário</label>
          <input type="radio" id="adm_type" <?php if( $row['type'] == 1 ) print 'checked="checked" '; ?>  name="type" value="1" /><label for="adm_type">Administrador</label>
          <?php 
            }
          ?>
          <label>Status: <?php ( $row['type'] == 0)  ?  ( ( $row['active'] == 0 ) ? print '<small>Inativo</small>' : print '<small>Ativo</small>'  ) : ''; ?></label>
          <?php 
            if( $row['type'] != 0 ){ 
          ?>
          <input type="radio" id="usr_status" <?php if( $row['active'] != 1 ) print 'checked="checked" '; ?> name="status" value="0" /><label for="usr_status">Inativo</label>
          <input type="radio" id="adm_status" <?php if( $row['active'] == 1 ) print 'checked="checked" '; ?> name="status" value="1" /><label for="adm_status">Ativo</label>
          <?php 
            }
          ?>
          <!--input type="submit" name="" value="OK" /-->
          <span class="btns">
            <a class="fa fa-check" href="javascript:void(0);" title="OK">OK</a>
            <?php 
              if( isset($_GET["uid"]) && $row['type'] == 1 ){
                echo '<a class="fa fa-trash" href="javascript:void(0);" title="Excluir">Excluir</a>';
              }
            ?>
          </span>
        </fieldset>
      </form>
    </main>
  </body>
</html>