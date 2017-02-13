      <img src="../images/logo-brainvest-inicio.png" />
      <blockquote>
          <p>Olá, <strong><?php print $usuario->getEmail(); ?></strong>! </p>
          <p>Último acesso em <?php print $usuario->getVisited(); ?>.</p>
          <a href="syslogin/controle.php?acao=sair"><span>sair</span></a>
      </blockquote>
