      <img src="../images/logo-brainvest-inicio.png" />
      <blockquote>
          <p>Olá, <strong><?php print $usuario->getName(); ?></strong>! </p>
          <p>Último acesso em <?php print $usuario->getVisited(); ?>.</p>
          <!--a href="usr_create.php?nvg=user&uid=<php print $usuario->getId(); ?>"><span>meu perfil</span></a-->
          <a href="syslogin/controle.php?acao=sair"><span>sair</span></a>
      </blockquote>
