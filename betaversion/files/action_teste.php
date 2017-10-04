<?php          

    $Random_Number      = rand(0, 9999999999); //Random number to be added to name 
    $Random_Number =  md5($Random_Number);
    echo 'Random_Number = '.$Random_Number;
    echo '<br>Length Random_Number = '.strlen($Random_Number).'<br>';
    echo '<br>Shor Random_Number = '.substr($Random_Number,1,8).'<br>';
    
     return;
/*** INÍCIO - ENVIO DE EMAIL ***/
     $servername = 'http://'.$_SERVER['SERVER_NAME'];

     $enviaFormularioParaNome = utf8_decode($name);
     $enviaFormularioParaEmail = $email;

     $caixaPostalServidorNome = 'Spatula';
     $caixaPostalServidorEmail = 'desenvolvimento@spatula.com.br';
     $caixaPostalServidorSenha = 'Sp@tul@2016';

     /* abaixo as veriaveis principais, que devem conter em seu formulario*/
     $assunto  = 'Confirmação de Cadastro';

     $mensagemConcatenada = '<div style="border:1px solid #EDEDED; padding:10px; text-align:center;">'; 
     $mensagemConcatenada .= ' <a href="'.$servername.'" target="_blank"><img src="" alt=""></a><br/><br/>'; 
     $mensagemConcatenada .= ' <strong style="font-size:18px;">Confirmação de Cadastro</strong><br/>'; 
     $mensagemConcatenada .= ' <strong></strong>, você realizou seu cadastro através do site '.$servername.'.<br/>'; 
     $mensagemConcatenada .= ' Para desfrutar de nossos serviços no site é importante a ativação do seu cadastrado <a href="'.$servername.'/?e='.$email.'&k_token='.$key_token.'" target="_blank">clicando aqui</a>.<br/>'; 
     $mensagemConcatenada .= ' Caso não consiga através no link acima, copie e cole no seu navegador essa URL: <br><em>'.$servername.'/?e='.$email.'&k_token='.$key_token.'</em><br/><br/>'; 
     $mensagemConcatenada .= ' Obrigado, a equipe da Spatula agradece sua visita.'; 
     $mensagemConcatenada .= '</div>'; 
     /*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 

     require_once('PHPMailer-master/PHPMailerAutoload.php');
       
     $mail = new PHPMailer();

     $mail->IsSMTP();
     $mail->SMTPAuth  = true;
     $mail->Charset   = 'utf8_decode()';
     $mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
     $mail->Port  = '587';
     $mail->Username  = $caixaPostalServidorEmail;
     $mail->Password  = $caixaPostalServidorSenha;
     $mail->From  = $caixaPostalServidorEmail;
     $mail->FromName  = utf8_decode($caixaPostalServidorNome);
     $mail->IsHTML(true);
     $mail->Subject  = utf8_decode($assunto);
     $mail->Body  = utf8_decode($mensagemConcatenada);
     
     $mail->AddBCC('rafaelkellows@hotmail.com', 'Rafael S. Kellows');
     $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));

     if(!$mail->Send()){
       $mensagemRetorno = '0';
     }else{
       $mensagemRetorno = '2';
     }
     echo $mensagemRetorno;
     return;
?>
