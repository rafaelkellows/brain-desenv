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
  <?php include 'head.php';?>
  <body>    
    <main class="files">
      <?php include 'blockote.php';?>
      <section class="list">
        <h2><i class="fa fa-list" aria-hidden="true"></i> Lista de Usuários</h2>
        <!--a href="javascript:window.history.back();" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a-->
        <a href="home.php" title="voltar"><i class="fa fa-reply-all" aria-hidden="true"></i></a>
        <ul>
          <?php
              $oConn = New Conn();
              $oSlct = $oConn->SQLselector("*","tbl_users","","name"); 

              if ($oSlct) {
                  while ( $row = mysql_fetch_array($oSlct) ) {
                    $usr_type = ($row["type"] == 0) ? 'fa-user' : 'fa-cog' ;
                    $usr_type_title = ($row["type"] == 0) ? 'Usuário' : 'Administrador' ;
                    $usr_status = ($row["active"] == 0) ? 'fa-ban' : 'fa-check' ;
                    $usr_status_title = ($row["active"] == 0) ? 'Inativo' : 'Ativo' ;

                    echo '<li><a href="usr_create.php?nvg=user&uid='.$row['id_user'].'"><em>'.$row["id_user"].'</em> <span>'.$row["name"].'</span><i title="'.$usr_type_title.'" class="fa '.$usr_type.'" aria-hidden="true"></i>&nbsp;<i title="'.$usr_status_title.'" class="fa '.$usr_status.'" aria-hidden="true"></i></a></li>';
                  }
              }else{
                  "Não há usuário(s) cadastrado(s)!";
              }
          ?>
        </ul>
      </section>
    </main>
  </body>
</html>