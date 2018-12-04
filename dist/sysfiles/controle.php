<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once 'connector.php'; 
require_once 'usuario.php';
require_once 'autenticador.php'; 
require_once 'sessao.php';
require_once '../pt_br/email.php';
   

 
switch($_REQUEST["formType"]) {
 
    case 'login': {
 
        # Uso do singleton para instanciar
        # apenas um objeto de autenticação
        # e esconder a classe real de autenticação
        $aut = AutenticadorSysFile::instanciar();
        $sess = SessaoSysFile::instanciar();
 
        # efetua o processo de autenticação
        echo $_REQUEST["usr_email"].' - '.$_REQUEST["usr_password"];
        if ($aut->logar($_REQUEST["usr_email"], $_REQUEST["usr_password"])) {
            # redireciona o usuário para dentro do sistema
            //echo $aut->logar($_REQUEST["usr_email"], $_REQUEST["usr_password"]);
            $usuario = $aut->pegar_usuario();
            if($usuario->getActive()==1){
                header('location: ../pt_br/');
            }else{
                # Usuário não validado
                $sess->set('usuario', 0);
                session_write_close();
                $aut->expulsar();

                header('location: ../pt_br/?msg=4');
            }
        }
        else {
            # E-mail/Senha inválido.
            header('location: ../pt_br/?msg=0');
        }
 
    } break;
 
    case 'remember': {
        $oConn = New Conn();
        //Get last tag inserted
        $oSlctUser = $oConn->SQLselector("*","tbl_users","email='".$_REQUEST["usr_email"]."'","");
        $rUser = mysql_num_rows($oSlctUser);
        if($rUser) {
            $row = mysql_fetch_array($oSlctUser);
            if($row){
                emailSend('remember',$row['name'],$row['email'],$row['password'],$row['id'],'');
            }
        }else{
            header('location: ../pt_br/?msg=3');
        }
    } break;

    case 'sair': {
 
        # envia o usuário para fora do sistema
        # o form de login
        session_destroy();
        header('location: ../sysfiles/logout.php');
 
    } break;

    default: {
        session_destroy(); 
        header('location: ../sysfiles/logout.php');
    }
 
}