<?php 
  require_once '../sysfiles/connector.php'; 
  require_once '../sysfiles/usuario.php';
  require_once '../sysfiles/autenticador.php'; 
  require_once '../sysfiles/sessao.php';
   
  $aut = AutenticadorSysFile::instanciar();
   
  $usuario = null;
  if ($aut->esta_logado()) {
    $usuario = $aut->pegar_usuario();
    $usrtype = $usuario->getType();
  }else{
    $usuario = null;
  }
  require_once 'inc/head.php';

  if($submitReturn > -1){ 
  	$style = 'style="display:block;"';
  }else{
  	$style = '';
  }
  function getMsg($uStatus){
    $submitReturn = (!isset($_GET["msg"]) ? -1 : $_GET["msg"]);
  	if($uStatus=='notlogged'){
	  	switch ($submitReturn) {
		  	case 0:
		      echo '<em class="msg error">E-mail/Senha inválido. Tente novamente.</em>';
		      break;
		  	case 1:
		      echo '<em class="msg success">Algum erro aconteceu!</em>';
		      break;
		  	case 2:
		      echo '<em class="msg success" style="color:#4CAF50">Senha enviada com sucesso<br>para o e-mail cadastrado.</em>';
		      break;
		  	case 3:
		      echo '<em class="msg error">E-mail inserido não existe no sistema.<br>Tente novamente.</em>';
		      break;
		  	case 4:
		      echo '<em class="msg success">Seu e-mail ainda não foi validado.<br>Verifique sua caixa de entrada ou a de <em>span</em> para validar.</em>';
		      break;
		  	case 5:
		      echo '<em class="msg success" style="color:#4CAF50">Cadastrado validado com sucesso.<br>Insira os dados enviado por e-mail e acesse o sistema.</em>';
		      break;
		  	case 6:
		      echo '<em>Cadastrado já foi validado<br>.<br>Insira os dados que foi enviado por e-mail e acesse o sistema.</em>';
		      break;
		      # Usuário não validado
		  	default:
		      break;
			}
		}
		if($uStatus=='loggedAdm'){
	  	switch ($submitReturn) {
      	case 0:
          echo '<em class="msg error">E-mail/Senha inválido. Tente novamente.</em>';
          break;
      	case 1:
          echo '<em class="msg success">Algum erro aconteceu!</em>';
          break;
      	case 2:
          echo '<em class="msg success" style="color:#4CAF50">Dados atualizados com sucesso.</em>';
          break;
      	case 3:
          echo '<em class="msg success" style="color:#4CAF50">Dados inseridos com sucesso.</em>';
          break;
      	case 4:
          echo '<em class="msg error">E-mail já existe no sistema.</em>';
          break;
      	case 5:
          echo '<em class="msg success" style="color:#4CAF50">Artigo deletado com sucesso!</em>';
          echo '<input type="hidden" name="tabActive" value="1">';
          break;
      	default:
          break;
	  	}
		}
	}
?>

<section class="sys" <?php echo $style; ?>>
		<?php
			$parameter = $_SERVER['QUERY_STRING'];
			//echo $parameter ;

			if(empty($usuario)){
				echo "<form id='system' action='../sysfiles/controle.php' method='post' target='_self'>";
				echo "<input type='hidden' name='formType' value='login'>";
			}else{
				echo "<form id='system' action='sys_action.php' method='post' target='_self'>";
				echo "<input type='hidden' name='usrtype' value='".$usrtype."'>";
				echo "<input type='hidden' name='usrID' value='".$usuario->getId()."'>";
				
				if( !strlen($parameter) ){
					echo "<input type='hidden' name='formType' value='new_item'>";
				}else{
					
					if( isset($_REQUEST['r']) ){
						if( $_REQUEST['r'] != 'new' ){
							echo "<input type='hidden' name='formType' value='update_item'>";
						}else{
						echo "<input type='hidden' name='formType' value='new_item'>";
						}
					}

					if( isset($_REQUEST['a']) ){
						if( $_REQUEST['a'] != 'new' ){
							echo "<input type='hidden' name='formType' value='update_item'>";
						}else{
							if( isset($_REQUEST['f']) ){
								echo "<input type='hidden' name='formType' value='resend'>";
							}else{
								echo "<input type='hidden' name='formType' value='new_item'>";
							}
						}
					}
					if( isset($_REQUEST['i']) ){
						if( $_REQUEST['i'] != 'new' ){
							echo "<input type='hidden' name='formType' value='update_item'>";
						}else{
						echo "<input type='hidden' name='formType' value='new_item'>";
						}
					}

					if( isset($_REQUEST['u']) ){
						if( $_REQUEST['u'] != 'new' ){
							echo "<input type='hidden' name='formType' value='update_item'>";
						}else{
						echo "<input type='hidden' name='formType' value='new_item'>";
						}
					}

				}
			}
			if(empty($usuario)){
		?>
		<img src="../images/logo-brainvest-topo.png" alt="" title="" />
		<?php
			}
		?>
		<a class="btn close" href="javascript:void(0);" title="Clique aqui para fechar a janela"><i class="fa fa-times"></i></a>
		<?php
			if(empty($usuario)){
		?>
		<fieldset>
			<legend>Acesso Restrito</legend>
			<p>&nbsp;</p>
			<?php
			  getMsg('notlogged');
			?>			
			<input type="text" name="usr_email" placeholder="DIGITE O SEU E-MAIL" value="" />
			<input type="password" name="usr_password" placeholder="DIGITE A SUA SENHA" value="" />
			<a class="lnks remember" href='javascript:void(0);' target='_blank'>não lembro a senha</a>
			<a class="btn go login" href="javascript:void(0);" title="ENTRAR"><span>ENTRAR</span></a>
		</fieldset>
		<?php
			}else{
		?>
		<fieldset class="logged <?php if( $usuario ){ echo "admin"; } ?>">
			<legend>Olá, <?php print $usuario->getName(); ?><a class="btn sign-out" href="../sysfiles/logout.php" title="Clique aqui para sair do sistema"><span>Log Off</span> <i class="fa fa-sign-out"></i></a></legend>
			<?php
				if( $usrtype == 1 ){
					echo "<p>Você está no seu canal privado da Brainvest</p>";
					getMsg('loggedAdm');
					echo "<nav class='nav-adm'>";
					echo "	<a class='btn add' href='javascript:void(0);' title=''><i class='fa fa-plus'></i></a>";
					echo "	<ul>";
					echo "		<li><a href='./?a=new' title='Clique para adicionar um Relatório'>Relatório</a></li>";
					echo "		<li><a href='./?i=new' title='Clique para adicionar um Artigo'>Artigo</a></li>";
					echo "		<li><a href='./?r=new' title='Clique para adicionar uma Matéria (Imprensa)'>Matéria</a></li>";
					echo "		<li><a href='./?u=new' title='Clique para adicionar um Usuário'>Usuário</a></li>";
					echo "	</ul>";
					echo "</nav>";
				}else{
					echo "<p>&nbsp;</p>";
					getMsg('loggedAdm');
				}
			?>
			<section>
				<?php
		            $oConn = New Conn();
		            
		            if(isset($_REQUEST['r']) or isset($_REQUEST['a']) or isset($_REQUEST['u']) or isset($_REQUEST['i'])){
		            	//ADMIN
		            	//ADD/EDIT Relatórios
		          		if (isset($_REQUEST['r'])){
				            $oSlctArticles = $oConn->SQLselector("*","tbl_uploads","id='".$_REQUEST['r']."'","");
				            $rUploads = mysql_num_rows($oSlctArticles);
				            if($rUploads) {
				            	$rowArticle = mysql_fetch_array($oSlctArticles);
				              	echo "<article class='add-article'>";
				              	echo "	<h1><span>Editar Matéria (Imprensa)</span><i class='fa fa-file-text-o'></i><!--a class='trash' href='javascript:void(0);'><i class='fa fa-trash'></i></a--></h1>";
				              	echo "	<a class='btn back' href='./'><span>VOLTAR</span></a>";
				              	echo "	<input type='text' name='date' placeholder='DATA' value='".$rowArticle['date']."' />";
				              	echo "	<input type='hidden' name='uID' value='".$rowArticle['id']."' />";
				              	echo "	<input type='hidden' name='type' value='".$rowArticle['type']."' />";
				              	echo "	<input type='text' name='title' placeholder='TÍTULO' value='".$rowArticle['title']."' />";
				              	echo "	<ul class='align'>";
				              	echo "		<input class='btn-adm' type='button' name='image_src' value='ADICIONAR IMAGEM .JPG/.JPEG, .PNG OU .GIF DE ATÉ 500KB.' />";
				              	echo "		<input type='file' name='file' id='file' class='hide' />";

				              	echo "		<input type='hidden' name='img_path' value='".$rowArticle['img_src']."' />";
				              	echo "		<input type='hidden' name='img_align' value='".$rowArticle['img_align']."' />";
				              	$active = '';
				              	if($rowArticle['img_align'] == 'a-left'){ $al = 'active'; }else{ $al = ''; }
								echo "		<li class='".$al."'><a class='a-left' href='javascript:void(0);'><img src='../images/sys/a-left.gif' title='Imagem alinhado à esquerda' alt='Imagem alinhado à esquerda' /></a></li>";
				              	if($rowArticle['img_align'] == 'a-center'){ $ac = 'active'; }else{ $ac = ''; }
								echo "		<li class='".$ac."'><a class='a-center' href='javascript:void(0);'><img src='../images/sys/a-center.gif' title='Imagem alinhado encima, preenchido e ao centro' alt='Imagem alinhado encima, preenchido e ao centro' /></a></li>";
				              	if($rowArticle['img_align'] == 'a-right'){ $ar = 'active'; }else{ $ar = ''; }
								echo "		<li class='".$ar."'><a class='a-right' href='javascript:void(0);'><img src='../images/sys/a-right.gif' title='Imagem alinhado à direita' alt='Imagem alinhado à direita' /></a></li>";
				              	if($rowArticle['img_align'] == 'a-bottom'){ $ab = 'active'; }else{ $ab = ''; }
								echo "		<li class='".$ab."'><a class='a-bottom' href='javascript:void(0);'><img src='../images/sys/a-bottom.gif' title='Imagem alinhado embaixo, preenchido e ao centro' alt='Imagem alinhado embaixo, preenchido e ao centro' /></a></li>";
				              	echo "	</ul>";
				              	echo "	<nav>";
				              	echo "		<a class='btn' href='javascript:void(0);' title='Clique para editar o HTML'><i class='fa fa-code'></i></a>";
				              	echo "		<a class='btn' href='javascript:void(0);' title='Clique para visualizar'><i class='fa fa-desktop'></i></a>";
				              	echo "		<a class='btn' href='javascript:void(0);' title='Clique para ver a imagem'><i class='fa fa-photo'></i></a>";
				              	echo "	</nav>";
				              	echo "	<textarea name='text' placeholder='TEXTO'>".$rowArticle['resume']."</textarea>";
				              	echo "	<pre>".$rowArticle['resume']."</pre>";
				              	echo "	<figure><img src='".$rowArticle['img_src']."' alt='' title='' /></figure>";
				              	echo "	<input type='text' name='article_link' placeholder='LINK ORIGINAL (SE HOUVER)' value='".$rowArticle['lnk_from']."' />";
				              	echo "	<a class='btn go send' href='javascript:void(0);' title='Clique para enviar o formulário.'><span>ENVIAR</span></a>";
				              	echo "</article>";
				          	}else{
				              	echo "<article class='add-article'>";
				              	echo "	<h1><span>Adicionar Matéria (Imprensa)</span><i class='fa fa-file-text-o'></i><!--a class='trash' href='javascript:void(0);'><i class='fa fa-trash'></i></a--></h1>";
				              	echo "	<a class='btn back' href='./'><span>VOLTAR</span></a>";
				              	echo "	<input type='text' name='date' placeholder='DATA' value='' />";
				              	echo "	<input type='hidden' name='uID' value='' />";
				              	echo "	<input type='hidden' name='type' value='r' />";
				              	echo "	<input type='text' name='title' placeholder='TÍTULO' value='' />";
				              	echo "	<ul class='align'>";
				              	echo "		<input class='btn-adm' type='button' name='image_src' value='ADICIONAR IMAGEM .JPG, .PNG OU .GIF DE ATÉ 500KB.' />";
				              	echo "		<input type='file' name='file' id='file' class='hide' />";

				              	echo "		<input type='hidden' name='img_path' value='' />";
				              	echo "		<input type='hidden' name='img_align' value='' />";
								echo "		<li><a class='a-left' href='javascript:void(0);'><img src='../images/sys/a-left.gif' title='Imagem alinhado à esquerda' alt='Imagem alinhado à esquerda' /></a></li>";
								echo "		<li><a class='a-center' href='javascript:void(0);'><img src='../images/sys/a-center.gif' title='Imagem alinhado encima, preenchido e ao centro' alt='Imagem alinhado encima, preenchido e ao centro' /></a></li>";
								echo "		<li><a class='a-right' href='javascript:void(0);'><img src='../images/sys/a-right.gif' title='Imagem alinhado à direita' alt='Imagem alinhado à direita' /></a></li>";
								echo "		<li><a class='a-bottom' href='javascript:void(0);'><img src='../images/sys/a-bottom.gif' title='Imagem alinhado embaixo, preenchido e ao centro' alt='Imagem alinhado embaixo, preenchido e ao centro' /></a></li>";
				              	echo "	</ul>";
				              	echo "	<nav>";
				              	echo "		<a class='btn' href='javascript:void(0);' title='Clique para editar o HTML'><i class='fa fa-code'></i></a>";
				              	echo "		<a class='btn' href='javascript:void(0);' title='Clique para visualizar'><i class='fa fa-desktop'></i></a>";
				              	echo "		<a class='btn' href='javascript:void(0);' title='Clique para ver a imagem'><i class='fa fa-photo'></i></a>";
				              	echo "	</nav>";
				              	echo "	<textarea name='text' placeholder='TEXTO. Utilize formatações HTML (<p>, <em>, <strong>, etc) para personalizar seu texto.'></textarea>";
				              	echo "	<pre></pre>";
				              	echo "	<figure><img src='' alt='' title='' /></figure>";
				              	echo "	<input type='text' name='article_link' placeholder='LINK ORIGINAL (SE HOUVER)' value='' />";
				              	echo "	<a class='btn go send' href='javascript:void(0);' title='Clique para enviar o formulário.'><span>ENVIAR</span></a>";
				              	echo "</article>";
				          	}
			          	}
		            	//ADD/EDIT Matérias
			          	if (isset($_REQUEST['a'])){
				            $oSlctArticles = $oConn->SQLselector("*","tbl_uploads","id='".$_REQUEST['a']."'","");
			            	$rowArticle = mysql_fetch_array($oSlctArticles);
				            if($rowArticle[0]) {
				              	echo "<article class='add-file'>";
				              	echo "	<h1><span>visualizar Relatório</span><i class='fa fa-file-text-o'></i><!--a class='trash' href='javascript:void(0);'><i class='fa fa-trash'></i></a--></h1>";
				              	echo "	<a class='btn back' href='./'><span>VOLTAR</span></a>";
				              	echo "	<input type='hidden' name='uID' value='".$rowArticle['id']."' />";
				              	echo "	<input type='hidden' name='type' value='".$rowArticle['type']."' />";
				              	$servername = 'http://'.$_SERVER['SERVER_NAME'].'/beta/pt_br/';
				              	echo "<label style=display:inline-block><strong>Arquivo: <br><u style='text-transform:initial;color:#f5851f;'>".$rowArticle['title']."</u></strong>";
				              	echo "	<p>URL: <a style=color:#f5851f href='".$servername.$rowArticle['lnk_from']."' target='_blank'>".$servername.$rowArticle['lnk_from']."</a></p></label><br><br>";
				              	//echo "	<input class='btn-adm' type='button' name='file_src' value='ADICIONAR UM ARQUIVO .ZIP OU .PDF DE ATÉ 5MB.' />";
				              	echo "	<input type='hidden' name='title' value='".$rowArticle['title']."' />";
				              	echo "	<input type='file' name='file' id='file' class='hide' />";
				              	echo "	<input type='hidden' name='img_path' value='".$rowArticle['lnk_from']."' />";
					            
					            $oSlctUploads = $oConn->SQLselector("*","tbl_users","","name ASC");
					            if($oSlctUploads) {
									echo "<h1><span>Quem Recebeu:</span><i class='fa fa-users'></i></h1>";
				              		echo "<select style=display:inline-block name='usr_send[]' multiple>";
									while ( $rowUser = mysql_fetch_array($oSlctUploads) ) {
										$oSlctUser = $oConn->SQLselector("*","tbl_usr_upload","id_user = '".$rowUser['id']."' and id_upload = '".$_REQUEST['a']."'","");
										$rO = mysql_fetch_array($oSlctUser);
										if($rO) {
											if($rO['st_read']==1){
												$st = "Visualizado";
												$st_read = "read";
											}else{
												$st = "Não Visualizado";
												$st_read = "";
											}
											echo "<option class='".$st_read."' value='".$rowUser['id']."'>".$rowUser['name']." - ".$rowUser['email']." - ".$st."</option>";
										}else{
											$slcd = '';
										}
										//echo "	<input type='checkbox' name='usr_email' value='".$rowUser['id']."' /><span>".$rowUser['name']." - ".$rowUser['email']."</span>";
									}
					              	echo "</select>";
					              	echo "<div style='text-align:center;'>";
									echo "	<a class='btn delete disabled' href='javascript:void(0);'><i class='fa fa-trash'></i><span>EXCLUIR</span></a>";
									echo "	<a class='btn resend' href='./?a=new&m=resend&f=".$_REQUEST['a']."'><i class='fa fa-repeat'></i><span>RE-ENVIAR</span></a>";
									echo "</div>";
					            }

								if( $usrtype == 1 ){
					                if( $rowArticle["active"] == '0' ) { 
					              		echo "	<label style=display:inline-block><strong>Status:</strong><input type='radio' name='file_status' value='0' checked /><span>Inativo</span>&nbsp;&nbsp;<input type='radio' name='file_status' value='1' /> <span>Ativo</span></label><br><br>";
					              	}else{
					              		echo "	<label style=display:inline-block><strong>Status:</strong><input type='radio' name='file_status' value='0' /><span>Inativo</span>&nbsp;&nbsp;<input type='radio' name='file_status' value='1' checked /> <span>Ativo</span></label><br><br>";
					              	}
				              	}

				              	echo "	<a class='btn go send' href='javascript:void(0);' title='Clique para enviar o formulário.'><span>ENVIAR</span></a>";
				              	echo "</article>";

				          	}else{
				              	echo "<article class='add-file'>";
				              	if (isset($_REQUEST['m'])){
				              		if($_REQUEST['m']=='resend'){
				              			$method = 'Re-enviar ';
				              		}else{
										$method = 'Adicionar ';
				              		}
				              	}

				              	echo "	<h1><span>".$method." Relatório</span><i class='fa fa-file-text-o'></i><!--a class='trash' href='javascript:void(0);'><i class='fa fa-trash'></i></a--></h1>";
				              	echo "	<a class='btn back' href='./'><span>VOLTAR</span></a>";
				              	echo "	<input type='hidden' name='type' value='a' />";
				              	if (isset($_REQUEST['m'])){
				              		if($_REQUEST['m']=='resend'){
				              			echo "	<input type='hidden' name='uID' value='".$_REQUEST['f']."' />";
							            $oSlctArticles = $oConn->SQLselector("*","tbl_uploads","id='".$_REQUEST['f']."'","");
						            	$rowArticle = mysql_fetch_array($oSlctArticles);
							            if($rowArticle[0]) {
							              	$servername = 'http://'.$_SERVER['SERVER_NAME'].'/beta/pt_br/';
							              	echo "<label style=display:inline-block><strong>Arquivo: <br><u style='text-transform:initial;color:#f5851f;'>".$rowArticle['title']."</u></strong>";
							              	echo "	<p>URL: <a style=color:#f5851f href='".$servername.$rowArticle['lnk_from']."' target='_blank'>".$servername.$rowArticle['lnk_from']."</a></p></label><br><br>";
							              	//echo "	<input class='btn-adm' type='button' name='file_src' value='ADICIONAR UM ARQUIVO .ZIP OU .PDF DE ATÉ 5MB.' />";
							              	echo "	<input type='hidden' name='title' value='".$rowArticle['title']."' />";
							              	echo "	<input type='file' name='file' id='file' class='hide' />";
							              	echo "	<input type='hidden' name='img_path' value='".$rowArticle['lnk_from']."' />";
							              }
				              		}
				              	}else{
				              		echo "	<input type='hidden' name='uID' value='' />";
					              	echo "	<input class='btn-adm' type='button' name='file_src' value='ADICIONAR UM ARQUIVO .ZIP OU .PDF DE ATÉ 5MB.' />";
					              	echo "	<p class='loading'>carregando</p>";
					              	echo "	<input class='btn-adm' type='text' name='title' placeholder='DIGITE UM TÍTULO PARA IDENTIFICAR O ARQUIVO.' />";
				              	}
					            $oSlctUsers = $oConn->SQLselector("*","tbl_users","","name ASC");
					            if($oSlctUsers) {
				              	echo "	<h1><span>Marque abaixo quem receberá a notificação</span><i class='fa fa-users'></i></h1>";
				              	echo "	<input type='text' name='search' placeholder='DIGITE AQUI UM NOME PARA PROCURAR' value='' />";
				              		//echo "<label><strong>Selecione quem irá receber:</strong></label>";
				              		//echo "<select class='userstosend' style='margin-bottom:0' name='usr_send[]' multiple>";
									echo "<ul class='userlist' style='height:150px'>";
									while ( $rowUser = mysql_fetch_array($oSlctUsers) ) {
										//echo "<option value='".$rowUser['id']."'>".$rowUser['name']." - ".$rowUser['email']."</option>";
										echo "<li><input type='checkbox' name='usr_send[]' value='".$rowUser['id']."' /><span>".$rowUser['name']." - ".$rowUser['email']."</span></li>";
									}
									echo "</ul>";
					              	//echo "</select><em style='font-size:1em; text-align:center; font-style:normal; padding:.5em 0; display:block; '>Obs.: segure o botão CTRL (windows)/COMMAND (Mac) para multipla seleção ou.</em><label><input type='checkbox' name='allusers' value='all' /><span>enviar para todos</span></label><br>";
					            }
				              	echo "	<h1><span>TEXTO ADICIONAL: <em style='text-transform:lowercase; font-style: normal; font-size: 0.9em; float: right; margin: -0.1em 0.5em 0 0'>restam <font class='crts'>xx</font> caracteres</em></span><i class='fa fa-pencil-square-o'></i></h1>";
				              	echo "	<input type='text' name='complement' placeholder='Digite aqui um texto com até 100 caracteres para complementar o seu e-mail' maxlength='100' value='' />";
				              	echo "	<input type='file' name='file' id='file' class='hide' />";
				              	echo "	<input type='hidden' name='img_path' value='' />";
				              	echo "	<a class='btn go send' href='javascript:void(0);' title='Clique para enviar o formulário.'><span>ENVIAR</span></a>";
				              	echo "</article>";
				          	}
			          	}
		            	//ADD/EDIT Artigos
			          	if (isset($_REQUEST['i'])){
				            $oSlctArticles = $oConn->SQLselector("*","tbl_uploads","id='".$_REQUEST['i']."'","");
			            	$rowArticle = mysql_fetch_array($oSlctArticles);
				            if($rowArticle[0]) {
				              	echo "<article class='add-file'>";
				              	echo "	<h1><span>visualizar Artigo</span><i class='fa fa-file-text-o'></i><!--a class='trash' href='javascript:void(0);'><i class='fa fa-trash'></i></a--></h1>";
				              	echo "	<a class='btn back' href='./'><span>VOLTAR</span></a>";
				              	echo "	<input type='hidden' name='uID' value='".$rowArticle['id']."' />";
				              	echo "	<input type='hidden' name='type' value='".$rowArticle['type']."' />";
				              	$servername = 'http://'.$_SERVER['SERVER_NAME'].'/beta/pt_br/';
				              	echo "<label style=display:inline-block><strong>Arquivo: <br><u style='text-transform:initial;color:#f5851f;'>".$rowArticle['title']."</u></strong>";
				              	echo "	<p>URL: <a style=color:#f5851f href='".$servername.$rowArticle['lnk_from']."' target='_blank'>".$servername.$rowArticle['lnk_from']."</a></p></label><br><br>";
				              	//echo "	<input class='btn-adm' type='button' name='file_src' value='ADICIONAR UM ARQUIVO .ZIP OU .PDF DE ATÉ 5MB.' />";
				              	echo "	<input type='hidden' name='title' value='".$rowArticle['title']."' />";
				              	echo "	<input type='file' name='file' id='file' class='hide' />";
				              	echo "	<input type='hidden' name='img_path' value='".$rowArticle['lnk_from']."' />";
					            
								if( $usrtype == 1 ){
					                if( $rowArticle["active"] == '0' ) { 
					              		echo "	<label style=display:inline-block><strong>Status:</strong><input type='radio' name='file_status' value='0' checked /><span>Inativo</span>&nbsp;&nbsp;<input type='radio' name='file_status' value='1' /> <span>Ativo</span></label><br><br>";
					              	}else{
					              		echo "	<label style=display:inline-block><strong>Status:</strong><input type='radio' name='file_status' value='0' /><span>Inativo</span>&nbsp;&nbsp;<input type='radio' name='file_status' value='1' checked /> <span>Ativo</span></label><br><br>";
					              	}
				              	}

				              	echo "	<a class='btn go send' href='javascript:void(0);' title='Clique para enviar o formulário.'><span>ENVIAR</span></a>";
				              	echo "</article>";

				          	}else{
				              	echo "<article class='add-file'>";
				              	echo "	<h1><span>Adicionar Artigo</span><i class='fa fa-file-text-o'></i><!--a class='trash' href='javascript:void(0);'><i class='fa fa-trash'></i></a--></h1>";
				              	echo "	<a class='btn back' href='./'><span>VOLTAR</span></a>";
				              	echo "	<input type='hidden' name='uID' value='' />";
				              	echo "	<input type='hidden' name='type' value='i' />";
				              	echo "	<input class='btn-adm' type='button' name='file_src' value='ADICIONAR UM ARQUIVO .ZIP OU .PDF DE ATÉ 5MB.' />";
				              	echo "	<p class='loading'>carregando</p>";
				              	echo "	<input class='btn-adm' type='text' name='title' placeholder='DIGITE UM TÍTULO PARA IDENTIFICAR O ARQUIVO.' />";
					            /*
					            $oSlctUsers = $oConn->SQLselector("*","tbl_users","","name ASC");
					            if($oSlctUsers) {
				              	echo "	<h1><span>Marque abaixo quem receberá a notificação</span><i class='fa fa-users'></i></h1>";
				              	echo "	<input type='text' name='search' placeholder='DIGITE AQUI UM NOME PARA PROCURAR' value='' />";
				              		//echo "<label><strong>Selecione quem irá receber:</strong></label>";
				              		//echo "<select class='userstosend' style='margin-bottom:0' name='usr_send[]' multiple>";
									echo "<ul class='userlist' style='height:150px'>";
									while ( $rowUser = mysql_fetch_array($oSlctUsers) ) {
										//echo "<option value='".$rowUser['id']."'>".$rowUser['name']." - ".$rowUser['email']."</option>";
										echo "<li><input type='checkbox' name='usr_send[]' value='".$rowUser['id']."' /><span>".$rowUser['name']." - ".$rowUser['email']."</span></li>";
									}
									echo "</ul>";
					              	//echo "</select><em style='font-size:1em; text-align:center; font-style:normal; padding:.5em 0; display:block; '>Obs.: segure o botão CTRL (windows)/COMMAND (Mac) para multipla seleção ou.</em><label><input type='checkbox' name='allusers' value='all' /><span>enviar para todos</span></label><br>";
					            }

				              	echo "	<h1><span>TEXTO ADICIONAL: <em style='text-transform:lowercase; font-style: normal; font-size: 0.9em; float: right; margin: -0.1em 0.5em 0 0'>restam <font class='crts'>xx</font> caracteres</em></span><i class='fa fa-pencil-square-o'></i></h1>";
				              	echo "	<input type='text' name='complement' placeholder='Digite aqui um texto com até 100 caracteres para complementar o seu e-mail' maxlength='100' value='' />";*/
				              	echo "	<input type='file' name='file' id='file' class='hide' />";
				              	echo "	<input type='hidden' name='img_path' value='' />";
				              	echo "	<a class='btn go send' href='javascript:void(0);' title='Clique para enviar o formulário.'><span>ENVIAR</span></a>";
				              	echo "</article>";
				          	}
			          	}
		            	//ADD/EDIT USERS
			          	if (isset($_REQUEST['u'])){
							function randomPassword() {
							    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
							    $pass = array(); //remember to declare $pass as an array
							    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
							    for ($i = 0; $i < 8; $i++) {
							        $n = rand(0, $alphaLength);
							        $pass[] = $alphabet[$n];
							    }
							    return implode($pass); //turn the array into a string
							}
				            $oSlctUsers = $oConn->SQLselector("*","tbl_users","id='".$_REQUEST['u']."'","");
				            $rUsers = mysql_num_rows (  $oSlctUsers );
				            if($rUsers) {
				            	$rowUser = mysql_fetch_array($oSlctUsers);
				              	echo "<article class='add-user'>";
				              	echo "	<h1><span>Editar Usuário</span><i class='fa fa-file-text-o'></i><!--a class='trash' href='javascript:void(0);'><i class='fa fa-trash'></i></a--></h1>";
				              	echo "	<a class='btn back' href='./'><span>VOLTAR</span></a>";
				              	echo "	<input type='hidden' name='uID' value='".$rowUser['id']."' />";
				              	echo "	<input type='hidden' name='type' value='u' />";
				              	echo "	<input type='text' name='name' placeholder='NOME E SOBRENOME' value='".$rowUser['name']."' />";
				              	echo "	<input type='text' name='email' placeholder='E-MAIL' value='".$rowUser['email']."' />";
				              	if( $usrtype == 1 ){
					              	//echo "	<input type='hidden' name='password' value='".$rowUser['password']."' />";
				              		//echo "	<input type='text' name='fake_password' disabled placeholder='SENHA' value='".$rowUser['password']."' />";
				              		if($usuario->getId() == $rowUser['id']){
						              	echo "	<label><strong>Senha antiga:</strong><span>".$rowUser['password']."</span><input type='hidden' name='password' value='".$rowUser['password']."' /></label>";
						              	echo "	<label><strong>Senha nova:</strong><input type='text' style='width:100%; margin:.25em 0 0; background-color:#f7f7f7; text-align:center;'  name='new_password' value='' /></label>";
									}
					                if( $rowUser["active"] == '0' ) { 
					              		echo "	<label><strong>Status:</strong><input type='radio' name='usr_status' value='0' checked /><span>Inativo</span>&nbsp;&nbsp;<input type='radio' name='usr_status' value='1' /> <span>Ativo</span></label>";
					              	}else{
					              		echo "	<label><strong>Status:</strong><input type='radio' name='usr_status' value='0' /><span>Inativo</span>&nbsp;&nbsp;<input type='radio' name='usr_status' value='1' checked /> <span>Ativo</span></label>";
					              	}

					                if( $rowUser["type"] == '0' ) { 
					              		echo "	<label><strong>Acesso:</strong><input type='radio' name='usr_type' value='0' checked /><span>Básico</span>&nbsp;&nbsp;<input type='radio' name='usr_type' value='1' /> <span>Administrador</span></label>";
					              	}else{
					              		echo "	<label><strong>Acesso:</strong><input type='radio' name='usr_type' value='0' /><span>Básico</span>&nbsp;&nbsp;<input type='radio' name='usr_type' value='1' checked /> <span>Administrador</span></label>";
					              	}



				              	}else{
					              	echo "	<label><strong>Senha antiga:</strong><span>".$rowUser['password']."</span><input type='hidden' name='password' value='".$rowUser['password']."' /></label>";
					              	echo "	<label><strong>Senha nova:</strong><input type='text' style='width:100%; margin:.25em 0 0; background-color:#f7f7f7; text-align:center;'  name='new_password' value='' /></label>";

				              		//echo "	<input type='text' name='password' placeholder='SENHA' value='".$rowUser['password']."' />";

					                if( $rowUser["active"] == '0' ) { 
					              		echo "	<label><strong>Status:</strong><span>Inativo</span><input type='hidden' name='usr_status' value='0' /></label>";
					              	}else{
					              		echo "	<label><strong>Status:</strong><span>Ativo</span><input type='hidden' name='usr_status' value='1' /></label>";
					              	}

					                if( $rowUser["type"] == '0' ) { 
					              		echo "	<label><strong>Acesso:</strong><span>Básico</span><input type='hidden' name='usr_type' value='0' /></label>";
					              	}else{
					              		echo "	<label><strong>Acesso:</strong><span>Administrador</span><input type='hidden' name='usr_type' value='1' /></label>";
					              	}
				              	}
				              	//******************
				              	echo "	<a class='btn go send' href='javascript:void(0);' title='Salvar dados'><span>Salvar dados</span></a>";
				              	echo "</article>";
				          	}else{

				              	echo "<article class='add-user'>";
				              	echo "	<h1><span>Adicionar Usuário</span><i class='fa fa-file-text-o'></i><!--a class='trash' href='javascript:void(0);'><i class='fa fa-trash'></i></a--></h1>";
				              	echo "	<a class='btn back' href='./'><span>VOLTAR</span></a>";
				              	echo "	<input type='hidden' name='uID' value='' />";
				              	echo "	<input type='hidden' name='type' value='u' />";
				              	echo "	<input type='text' name='name' placeholder='NOME E SOBRENOME' value='' />";
				              	echo "	<input type='text' name='email' placeholder='E-MAIL' value='' />";
				              	$psw = randomPassword();
				              	echo "	<input type='hidden' name='password' value='".$psw."' />";
				              	echo "	<label><strong>Senha:</strong>".$psw."<br><em style='font-size:.8em; font-style:normal'>Obs.: a senha é gerada automaticamente.</em></label>";
				              	echo "	<label><strong>Status:</strong><input type='radio' name='usr_status' value='0' checked /><span>Inativo</span>&nbsp;&nbsp;<input type='radio' name='usr_status' value='1' /> <span>Ativo</span><br><em style='font-size:.8em; font-style:normal'>Obs.: deixe por enquanto inativo para que o usuário confirme através do e-mail que será enviado.</em></label>";
				              	echo "	<label><strong>Acesso:</strong><input type='radio' name='usr_type' value='0' checked /><span>Básico</span>&nbsp;&nbsp;<input type='radio' name='usr_type' value='1' /> <span>Administrador</span></label>";
				              	echo "	<a class='btn go send' href='javascript:void(0);' title='Clique para enviar o formulário.'><span>ENVIAR</span></a>";
				              	echo "</article>";
				          	}
			          	}
		            }else{
		              	echo "<nav>";
		              	echo "	<a href='javascript:void(0);' title='Clique para ver os Relatórios'>Relatórios</a>";
		              	echo "	<a href='javascript:void(0);' title='Clique para ver os Artigos'>Artigos</a>";
		              	echo "	<a href='javascript:void(0);' title='Clique para ver o que saiu na Imprensa'>Matérias</a>";
						if( $usrtype == 1 ){
		              		echo "	<a href='javascript:void(0);' title='Clique para ver os Usuários Cadastrados'>Usuários Cadastrados</a>";
		              	}else{
		              		echo "	<a href='javascript:void(0);' title='Clique para ver seus dados cadastrados'>Meus dados</a>";
		              	}
		              	echo "</nav>";
		              	
			          	//SELECT FILES
		            	$AND = "";
		            	if( $usrtype == 1 ){
							$AND = "";
						}else{
							$AND = "id_user = '".$usuario->getId()."'";
						}

			            $oSlctUserUploads = $oConn->SQLselector("*","tbl_usr_upload",$AND,"");
			            $uFiles = mysql_num_rows($oSlctUserUploads);
		            	$AND = "";
			            if($uFiles) {
							while ( $rows = mysql_fetch_array($oSlctUserUploads) ) {
				            	if( $usrtype == 1 ){
									$AND = " type = 'a'";
								}else{
									//$AND = " type = 'a' AND id = '".$rows['id_upload']."' AND active=1";
									$AND = " type = 'a' AND active = 1";
								}								
							}
			            }else{
			            	if( $usrtype == 1 ){
								$AND = " type = 'a'";
							}else{
								$AND = " type = 'a' AND id = '0'";
							}
			            }

			            $oSlctArticles = $oConn->SQLselector("*","tbl_uploads",$AND,"inserted DESC");
			            $uArticles = mysql_num_rows($oSlctArticles);
			            if($uArticles) {
			              	echo "<article>";
			              	echo "	<h1>Relatórios</h1>";
			              	echo "	<ul class='reports'>";
			              	while ( $rowArticle = mysql_fetch_array($oSlctArticles) ) {
								$date = date_create($rowArticle['inserted']);
								if( $usrtype == 0 ){
									$style = "style='width:96%'";
								}else{
									$style = "";
								}

				            	if( $usrtype == 1 ){
									$oSlctUserReadSt = $oConn->SQLselector("*","tbl_usr_upload","id_upload='".$rowArticle['id']."' and st_read='1'","");
								}else{
									$oSlctUserReadSt = $oConn->SQLselector("st_read","tbl_usr_upload","id_upload='".$rowArticle['id']."' and id_user='".$usuario->getId()."'","");
								}

					            $rReadSt = mysql_num_rows($oSlctUserReadSt);
					            if($rReadSt) {
					            	$rowReadSt = mysql_fetch_array($oSlctUserReadSt);
									$st = $rowReadSt['st_read'];
									if( $st == '1' ){
										$style_read = "read";
										$style_title = "Este Relatório já foi visto." ;
									}else{
										$style_read = "";
										$style_title = "Este Relatório ainda não foi visto." ;
									}

					            }


			                	echo "<li>";
								$servername = 'http://'.$_SERVER['SERVER_NAME'].'/beta/pt_br/';
			                	echo "	<a id='".$rowArticle['id']."' class='desc ".$style_read."' ".$style." href='".$servername.$rowArticle['lnk_from']."' target='_blank' title='Clique para fazer o download do Relatório.'>";
			                	echo "		<em>".date_format($date, 'd/m/Y') . ' <br> ' .date_format($date, 'G:ia')."</em>";
			                	echo "		<span>".$rowArticle['title']."</span>";
			                	echo "		<i class='fa fa-download'></i>";
			                	echo "	</a>";
								if( $usrtype == 1 ){
				                	echo "	<a class='check' href='./?a=".$rowArticle['id']."'>";
				                	echo "		<i class='fa fa-edit' title='Clique para Editar o Relatório.'></i>";
				                	echo "	</a>";
				                }else{
				                	//echo "	<a class='check' href='javascript:void(0);'>";
				                	echo "		<i class='fa fa-check ".$style_read."' title='".$style_title."'></i>";
				                	//echo "	</a>";
				                }
								if( $usrtype == 1 ){
									if($rowArticle['active'] == 1){
					                	echo "	<a class='unlock' href='./?a=".$rowArticle['id']."' title='Artigo ATIVO. Clique para bloquear/inativar esse Relatório'>";
					                	echo "		<i class='fa fa-unlock'></i>";
					                	echo "	</a>";
				                	}else{
					                	echo "	<a class='lock' href='./?a=".$rowArticle['id']."' title='Artigo INATIVO. Clique para desbloquear/ativar esse Relatório'>";
					                	echo "		<i class='fa fa-lock'></i>";
					                	echo "	</a>";
				                	}
				                }
			                	echo "</li>";
							}
			              	echo "	</ul>";
			              	echo "</article>";
			          	}else{
			              	echo "<article>";
			              	echo "	<h1>Relatórios</h1>";
			              	echo "	<ul><li>Nenhum relatório cadastrado.</li></ul>";
			              	echo "</article>";
			          	}
			            $oSlctMaterias = $oConn->SQLselector("*","tbl_uploads","type = 'i'","inserted DESC");
			            $uMaterias = mysql_num_rows($oSlctMaterias);
			            if($uMaterias) {
			              	echo "<article>";
			              	echo "	<h1>Artigos</h1>";
			              	echo "	<ul class='article'>";
			              	while ( $rowMaterias = mysql_fetch_array($oSlctMaterias) ) {
								$date = date_create($rowMaterias['inserted']);
								if( $usrtype == 0 ){
									$style = "style='width:96%'";
								}else{
									$style = "";
								}

								$oSlctUserReadSt = $oConn->SQLselector("st_read","tbl_usr_upload","id_upload='".$rowMaterias['id']."'","");
					            $rReadSt = mysql_num_rows($oSlctUserReadSt);
					            
					            if($rReadSt === 1) {
					            	$rowReadSt = mysql_fetch_array($oSlctUserReadSt);
									$st = $rowReadSt['st_read'];
									if( is_array($rowReadSt) ){
										$style_read = "read";
										$style_title = "Este Artigo já foi visto." ;
									}
					            }else{
									$style_read = "";
									$style_title = "Este Artigo ainda não foi visto." ;
					            }


			                	echo "<li>";
								$servername = 'http://'.$_SERVER['SERVER_NAME'].'/beta/pt_br/';
			                	echo "	<a id='".$rowMaterias['id']."' class='desc ".$style_read."' ".$style." href='".$servername.$rowMaterias['lnk_from']."' target='_blank' title='Clique para fazer o download do Artigo.'>";
			                	echo "		<em>".date_format($date, 'd/m/Y') . ' <br> ' .date_format($date, 'G:ia')."</em>";
			                	echo "		<span>".$rowMaterias['title']."</span>";
			                	echo "		<i class='fa fa-download'></i>";
			                	echo "	</a>";
								if( $usrtype == 1 ){
				                	echo "	<a class='check' href='./?i=".$rowMaterias['id']."'>";
				                	echo "		<i class='fa fa-edit' title='Clique para Editar o Artigo.'></i>";
				                	echo "	</a>";
				                }else{
				                	//echo "	<a class='check' href='javascript:void(0);'>";
				                	echo "		<i class='fa fa-check ".$style_read."' title='".$style_title."'></i>";
				                	//echo "	</a>";
				                }
								if( $usrtype == 1 ){
									if($rowMaterias['active'] == 1){
					                	echo "	<a class='unlock' href='./?i=".$rowMaterias['id']."' title='Artigo ATIVO. Clique para bloquear/inativar esse Artigo'>";
					                	echo "		<i class='fa fa-unlock'></i>";
					                	echo "	</a>";
				                	}else{
					                	echo "	<a class='lock' href='./?i=".$rowMaterias['id']."' title='Artigo INATIVO. Clique para desbloquear/ativar esse Artigo'>";
					                	echo "		<i class='fa fa-lock'></i>";
					                	echo "	</a>";
				                	}
				                }
			                	echo "</li>";
							}
			              	echo "	</ul>";
			              	echo "</article>";
			          	}else{
			              	echo "<article>";
			              	echo "	<h1>Artigos</h1>";
			              	echo "	<ul><li>Nenhum artigo cadastrado.</li></ul>";
			              	echo "</article>";
			          	}

		              	/*echo "<article>";
		              	echo "	<h1>Brainstorm</h1>";
		              	echo "	<ul>";
		              	echo "		<li>";
		              	echo "			<a class='desc' style='width:100%' href='../downloads/2018/brainstorm/brainstorm_10_v1.pdf' target='_blank' title='Clique para Ler o PDF.'>";
	                	echo "			<em>Edição 10</em>";
	                	echo "			<span>MAPA DO TESOURO IMOBILIÁRIO</span>";
	                	echo "			<i class='fa fa-file-text-o'></i>";
		              	echo "			</a>";
		              	echo "		</li>";
		              	echo "		<li>";
		              	echo "			<a class='desc' style='width:100%' href='../downloads/2018/brainstorm/brainstorm_9_v1.pdf' target='_blank' title='Clique para Ler o PDF.'>";
	                	echo "			<em>Edição 9</em>";
	                	echo "			<span>PATRIMÔNIO EM BOAS MÃOS</span>";
	                	echo "			<i class='fa fa-file-text-o'></i>";
		              	echo "			</a>";
		              	echo "		</li>";
		              	echo "		<li>";
		              	echo "			<a class='desc' style='width:100%' href='../downloads/2018/brainstorm/brainstorm_8_v1.pdf' target='_blank' title='Clique para Ler o PDF.'>";
	                	echo "			<em>Edição 8</em>";
	                	echo "			<span>O DISCRETO CHARME DOS TÍTULOS HIPOTECÁRIOS</span>";
	                	echo "			<i class='fa fa-file-text-o'></i>";
		              	echo "			</a>";
		              	echo "		</li>";
		              	echo "		<li>";
		              	echo "			<a class='desc' style='width:100%' href='../downloads/2018/brainstorm/brainstorm_7_v1.pdf' target='_blank' title='Clique para Ler o PDF.'>";
	                	echo "			<em>Edição 7</em>";
	                	echo '			<span>DE VOLTA AO BÁSICO: Investidor global abandona “hedge funds” e privilegia imóveis</span>';
	                	echo "			<i class='fa fa-file-text-o'></i>";
		              	echo "			</a>";
		              	echo "		</li>";
		              	echo "		<li>";
		              	echo "			<a class='desc' style='width:100%' href='../downloads/2018/brainstorm/brainstorm_6_v1.pdf' target='_blank' title='Clique para Ler o PDF.'>";
	                	echo "			<em>Edição 6</em>";
	                	echo "			<span>TODOS OS CAMINHOS LEVAM A ROMA: Pressão regulatória deve irrigar mercado de créditos não-performados e inflar retornos</span>";
	                	echo "			<i class='fa fa-file-text-o'></i>";
		              	echo "			</a>";
		              	echo "		</li>";
		              	echo "	</ul>";
		              	echo "</article>";
		              	*/

		            	//SELECT REPORTS/ARTICLES
			            $oSlctReports = $oConn->SQLselector("*","tbl_uploads","type = 'r'","inserted DESC");
			            
			            if($oSlctReports){
			              	echo "<article>";
			              	echo "	<h1>Imprensa</h1>";
			              	echo "	<ul>";
			              	while ( $rowReport = mysql_fetch_array($oSlctReports) ) {
								if( $usrtype == 0 ){
									$style = "style='width:100%'";
								}else{
									$style = "";
								}

			                	echo "<li>";
			                	echo "	<a class='desc' ".$style." href='javascript:void(0);' title='Clique para Ler o Artigo.'>";
			                	echo "		<em>".$rowReport['date']."</em>";
			                	echo "		<span>".$rowReport['title']."</span>";
			                	echo "		<i class='fa fa-file-text-o'></i>";
			                	echo "	</a>";

								if( $usrtype == 1 ){
				                	echo "	<a class='check' href='./?r=".$rowReport['id']."' title='Clique para Editar o Artigo.'>";
				                	echo "		<i class='fa fa-edit'></i>";
				                	echo "	</a>";
				                }else{
				                	//echo "	<a class='check' href='javascript:void(0)'>";
				                	//echo "		<i class='fa fa-check'></i>";
				                	//echo "	</a>";
				                }

								if( $usrtype == 1 ){
				                	echo "	<a class='trash' id='".$rowReport['id']."' href='javascript:void(0)' title='Clique para Excluir o Artigo.'>";
				                	echo "		<i class='fa fa-trash'></i>";
				                	echo "	</a>";
				                }

			                	echo "</li>";
			                	if(!empty($rowReport['resume'])){
			                		echo "<div class='noselect'>";
									if($rowReport['img_align']=='a-bottom'){
				                		echo $rowReport['resume'];
				                		if(!empty($rowReport['img_src'])){
											echo "<figure class='".$rowReport['img_align']."'>";
											echo "	<img src='".$rowReport['img_src']."' alt='".$rowReport['title']."' title='".$rowReport['title']."' />";
											echo "	<figcaption>".$rowReport['title']."</figcaption>";
											echo "</figure>";
				                		}
				                	}else{
				                		if(!empty($rowReport['img_src'])){
											echo "<figure class='".$rowReport['img_align']."'>";
											echo "	<img src='".$rowReport['img_src']."' alt='".$rowReport['title']."' title='".$rowReport['title']."' />";
											echo "	<figcaption>".$rowReport['title']."</figcaption>";
											echo "</figure>";
				                		}
				                		echo $rowReport['resume'];
				                	}
			                		if(!empty($rowReport['lnk_from'])){
										echo "<p>Fonte: <a href='".$rowReport['lnk_from']."' target='_blank'>";
										echo $rowReport['lnk_from'];
										echo "</a></p>";
			                		}
			                		echo "</div>";
			                	}
							}
			              	echo "	</ul>";
			              	echo "</article>";
			          	}else{
			              	echo "<article>";
			              	echo "	<h1>Imprensa</h1>";
			              	echo "	<ul><li>Nenhum artigo cadastrado.</li></ul>";
			              	echo "</article>";
			          	}	

			          	//SELECT USERS
			          	if( $usrtype == 1 ){
			            	$oSlctUsers = $oConn->SQLselector("*","tbl_users","","name ASC");
			        	}else{
			            	$oSlctUsers = $oConn->SQLselector("*","tbl_users","id = '".$usuario->getId()."'","name ASC");
			        	}
			            if($oSlctUsers) {
			              	echo "<article>";
			              	echo "	<h1>Usuários Cadastrados</h1>";
			              	echo "	<ul>";
			              	while ( $rowUser = mysql_fetch_array($oSlctUsers) ) {
								$date = date_create($rowUser['modified']);
								if( $usrtype == 0 ){
									$style = "style='width:96%'";
								}else{
									$style = "";
								}
			                	echo "<li>";
			                	echo "	<a class='desc' ".$style." href='javascript:void(0);'>";
			                	echo "		<em>".date_format($date, 'd/m/Y') . ' <br> ' .date_format($date, 'G:ia')."</em>";
			                	echo "		<span>".$rowUser['name']."<br>".$rowUser['email']."</span>";
			                	echo "	</a>";
			                	echo "	<a class='check' href='./?u=".$rowUser['id']."'>";
			                	echo "		<i class='fa fa-edit' title='Editar dados'></i>";
			                	echo "	</a>";
								if( $usrtype == 1 ){
									if($rowUser['active'] == 1){
					                	echo "	<a class='unlock' href='./?u=".$rowUser['id']."' title='Usuário ATIVO. Clique para bloquear/inativar esse usuário'>";
					                	echo "		<i class='fa fa-unlock'></i>";
					                	echo "	</a>";
				                	}else{
					                	echo "	<a class='lock' href='./?u=".$rowUser['id']."' title='Usuário INATIVO. Clique para desbloquear/ativar esse usuário'>";
					                	echo "		<i class='fa fa-lock'></i>";
					                	echo "	</a>";
				                	}
				                }
			                	echo "</li>";
								echo "	<div class='noselect'>";
								echo "		<p>";
								if($rowUser['type']==1){
									$type = 'Administrador';
								}else{
									$type = 'Básico';
								}
								echo "			Tipo de Acesso: <strong>".$type."</strong><br>";
								if($rowUser['active']==1){
									$active = 'Ativo';
								}else{
									$active = 'Inativo';
								}
								echo "			Status: <strong>".$active."</strong><br>";
								echo "			E-mail: <strong>".$rowUser['email']."</strong>";
								echo "		</p>";
								echo "	</div>";
							}
			              	echo "	</ul>";
			              	echo "</article>";
			          	}else{
			              	echo "<article>";
			              	echo "	<h1>Usuários Cadastrados</h1>";
			              	echo "	<ul><li>Nenhum usuário cadastrado.</li></ul>";
			              	echo "</article>";
			          	}
		            }
				?>

			</section>	
		</fieldset>
		<?php
			}
		?>

	</form>
</section>