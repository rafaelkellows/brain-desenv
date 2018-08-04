<?php 
  function emailSend($eType,$eName,$eEmail,$ePswd,$eId,$eToken,$eComplement){ // $eType = 'welcome','valid'
    switch ($eType) {
      case 'welcome':
        $assunto='Seja Bem-Vindo(a) a Área Exclusiva Brainvest';
        $msgComplemento = '';
        $msgComplemento .= ' Agora você tem um ambiente exclusivo para acessar <strong>RELATÓRIOS</strong> de seu portfólio e também ler nossos <strong>ARTIGOS</strong> e outras <strong>MATÉRIAS</strong> de interesse.<br/>'; 
        $msgComplemento .= ' <a href="http://www.brainvest.com/beta/pt_br/?t='.$eToken.'" target="_blank">Clique aqui</a> e confirme o seu cadastro com os dados abaixo.<br/>'; 
        $redirectTo = 'location: ./?msg=3';
        break;
      case 'valid':
        $assunto='Confirmação de Cadastrado';
        $msgComplemento = '';
        $msgComplemento .= ' <strong>Agradecemos a confirmação do seu cadastro!</strong><br/>';
        $msgComplemento .= ' Agora você tem total acesso a sua <strong>ÁREA EXCLUSIVA BRAINVEST</strong>.<br/>';
        $msgComplemento .= ' Seja Bem-vindo(a)!';
        $redirectTo = 'location: ./?u=new&msg=1';
        break;
      case 'remember':
        $assunto='Esqueci minha senha';
        $msgComplemento = '';
        $msgComplemento .= ' <strong>Sua solicitação de re-envio da senha foi atendida!</strong><br/>';
        $msgComplemento .= ' <a href="http://www.brainvest.com/beta/pt_br/" target="_blank">Clique aqui</a> e acesse com seus dados abaixo.<br/>';
        $msgComplemento .= ' <strong>Obs.:</strong> você pode alterar seus dados a qualquer momento no sistema.<br/><br/>';
        $redirectTo = 'location: ./?msg=3';
        break;
      case 'newpost':
        $assunto='Você tem Relatório Novo';
        $msgComplemento = '';
        $msgComplemento .= ' Você tem um <strong>RELATÓRIO NOVO</strong> em sua <strong>ÁREA EXCLUSIVA BRAINVEST</strong>.<br/>';
        $msgComplemento .= $eComplement.'<br>';
        $msgComplemento .= ' <a href="http://www.brainvest.com/beta/pt_br/" target="_blank">Clique aqui</a> e acesse agora mesmo.<br/>';
        //$redirectTo = 'location: ./?msg=3';
        //$redirectTo = 'location: ./?a='.$eId.'&msg=3';              
        break;
      case 'newarticle':
        $assunto='Você tem Artigo Novo';
        $msgComplemento = '';
        $msgComplemento .= ' Você tem um <strong>ARTIGO NOVO</strong> em sua <strong>ÁREA EXCLUSIVA BRAINVEST</strong>.<br/>';
        $msgComplemento .= ' <a href="http://www.brainvest.com/beta/pt_br/" target="_blank">Clique aqui</a> e acesse agora mesmo.<br/>';
        $redirectTo = 'location: ./?msg=3';
        header($redirectTo);
        //$redirectTo = 'location: ./?a='.$eId.'&msg=3';              
        break;
      default:
        $assunto='';
        $msgComplemento = '';
        $msgComplemento .= ' Abaixo segue os dados de acesso. Importante ter feito a confirmação do seu cadastrado para acessar.<br/>'; 
        break;
    }

    /*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
    $enviaFormularioParaNome = $eName;
    $enviaFormularioParaEmail = strtolower($eEmail);
     
    $caixaPostalServidorNome = 'Developer E-mail Account';
    $caixaPostalServidorEmail = 'developer@brainvest.com';
    $caixaPostalServidorSenha = 'ubzYF6!cW';
    /*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
     
    /* abaixo as veriaveis principais, que devem conter em seu formulario*/
    $remetenteNome  = 'Brainvest - Wealth Management';//$_POST['remetenteNome'];
    $remetenteEmail = 'no-replay@brainvest.com';//$_POST['remetenteEmail'];
    //$assunto  = 'Seja Bem-vindo(a) à Brainvest';
    //$assunto  = $_POST['assunto'];

    $mensagemConcatenada = '<div style="background: url(http://www.brainvest.com/beta/images/sys/bgmkt.jpg) -78px -164px repeat #f7f7f7; border:1px solid #EDEDED; padding:30px 10px; text-align:center; font-family: Trebuchet MS, arial; font-size: 16px; line-height: 25px; color:#4c5246">'; 
    $mensagemConcatenada .= ' <a href="http://www.brainvest.com" target="_blank"><img src="http://brainvest.com/images/logo-brainvest-topo.png" alt="Brainvest - Wealth Management" width="250"></a><br/><br/>'; 
    $mensagemConcatenada .= ' Olá, <strong style="font-size:18px; color:#ef8000">'.utf8_decode($enviaFormularioParaNome).'</strong>.<br/>'; 
    //$mensagemConcatenada .= ' Agora você tem uma <strong>ÁREA EXCLUSIVA BRAINVEST</strong>.<br/>'; 
    //$mensagemConcatenada .= ' Para acessar os <strong>RELATÓRIOS</strong> do seu portfólio e também ler nossos <strong>ARTIGOS</strong> e outras <strong>MATÉRIAS</strong>,<br/>'; 
    //$mensagemConcatenada .= ' <a href="http://www.brainvest.com/beta/pt_br/?t='.$eToken.'" target="_blank">clique aqui</a> e confirme o seu cadastro.<br/>'; 
    //$mensagemConcatenada .= ' <strong>Obs.:</strong> seu cadastrado foi realizado pelo administrador do sistema.<br/><br/>'; 
    //$mensagemConcatenada .= ' Abaixo segue os dados de acesso. Importante a confirmação do seu cadastrado para acessar.<br/>'; 
    $mensagemConcatenada .= $msgComplemento;
    if($eType != 'newpost' && $eType != 'valid' && $eType != 'newarticle') {
        $mensagemConcatenada .= ' <strong>E-mail: </strong> '.$eEmail.'<br>'; 
        $mensagemConcatenada .= ' <strong>Senha: </strong> '.$ePswd; 
    }
    $mensagemConcatenada .= '</div>'; 

    require_once('../PHPMailer-master/PHPMailerAutoload.php');
     
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
      //$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
      //return;
      header('location: ./?msg=3');
    }else{
      //$mensagemRetorno = 'Enviado para: '.$remetenteEmail.'<br>';
      //return;
        if(isset($redirectTo)){
            header($redirectTo);
        }
    }
  }
?>