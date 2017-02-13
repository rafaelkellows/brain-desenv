<?php
abstract class AutenticadorBrainvest {
 
    private static $instancia = null;
 
    private function __construct() {}
 
    /**
     * 
     * @return AutenticadorBrainvest
    */
    public static function instanciar() {
      if (self::$instancia == NULL) {
        self::$instancia = new AutenticadorEmBanco();
      }
      return self::$instancia; 
    }
 
    public abstract function logar($login, $password);
    public abstract function esta_logado();
    public abstract function pegar_usuario();
    public abstract function expulsar($d);
}

class AutenticadorEmBanco extends AutenticadorBrainvest {
 
    public function esta_logado() {
      $sess = SessaoBrainvest::instanciar();
      return $sess->existe('usuario');
    }
 
    public function expulsar($d) {
      $_d = (isset($d) && !empty($d))?'?d='.$d:'';      
      header('location: login.php'.$_d);
    }
 
    public function logar($login, $password) {
      //Estabelece conexão com o Servidor
      //$conn = mysql_connect('brainvestfiles.db.2054282.hostedresource.com','brainvestfiles', 'Kellows@Rafael4527') or die ('Falha ao conectar no Servidor!');
      $conn = mysql_connect('127.0.0.1','root', '') or die ('Falha ao conectar no Servidor!');
     
      //Define o Banco de Dados
      mysql_select_db('brainvestfiles', $conn);
      
      //Inicia a Sessão
      $sess = SessaoBrainvest::instanciar();

      /* Strings de Acessos */
      $strSelect = "select * from tbl_users where tbl_users.login ='{$login}' and tbl_users.password = '{$password}'";
      $strUpdate = "UPDATE tbl_users SET visited = now() WHERE tbl_users.login = '{$login}' AND tbl_users.password = '{$password}'";

      $result = mysql_query($strSelect);

      if ($result) {

        $dados = mysql_fetch_array($result);

        $usuario = new UsuarioBrainvest();
        $usuario->setId($dados['id_user']);
        $usuario->setName($dados['name']);
        $usuario->setEmail($dados['email']);
        $usuario->setLogin($dados['login']);
        $usuario->setPassword($dados['password']);
        $usuario->setType($dados['type']);
        $usuario->setActive($dados['active']);         
        $usuario->setVisited($dados['visited']);

        $sess->set('usuario', $usuario);
        mysql_query($strUpdate);
        return true;

      }
      else {
          return false;
      }
 
    }
 
    public function pegar_usuario() {
        $sess = SessaoBrainvest::instanciar();
 
        if ($this->esta_logado()) {
            $usuario = $sess->get('usuario');
            return $usuario;
        }
        else {
            return false;
        }
    }
}
?>