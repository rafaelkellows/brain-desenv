<?php
date_default_timezone_set("America/Araguaina");
abstract class AutenticadorSysFile {
 
    private static $instancia = null;
 
    private function __construct() {}
 
    /**
     * 
     * @return AutenticadorSysFile
    */
    public static function instanciar() {
      if (self::$instancia == NULL) {
        self::$instancia = new AutenticadorEmBanco();
      }
      return self::$instancia; 
    }
 
    public abstract function logar($email, $password);
    public abstract function esta_logado();
    public abstract function pegar_usuario();
    public abstract function expulsar($d);
}

class AutenticadorEmBanco extends AutenticadorSysFile {
 
    public function esta_logado() {
      $sess = SessaoSysFile::instanciar();
      return $sess->existe('usuario');
    }
 
    public function expulsar($d) {
      header('location: ../pt_br/');
    }
 
    public function logar($email, $password) {
      //Estabelece conexão com o Servidor
      $conn = mysql_connect('brainvestsys.db.2054282.b93.hostedresource.net','brainvestsys', 'Kellows@Rafael4527') or die ('Falha ao conectar no Servidor!');
      mysql_select_db('brainvestsys', $conn);
      
      //$conn = mysql_connect('127.0.0.1','root', '') or die ('Falha ao conectar no Servidor!');
      //mysql_select_db('db_brainvest', $conn);

      //Inicia a Sessão
      $sess = SessaoSysFile::instanciar();

      /* Strings de Acessos */
      $strSelect = "select * from tbl_users where tbl_users.email ='{$email}' and tbl_users.password = '{$password}'";
      $strUpdate = "UPDATE tbl_users SET visited = now() WHERE tbl_users.email = '{$email}' AND tbl_users.password = '{$password}'";

      $result = mysql_query($strSelect);
      $dados = mysql_fetch_array($result);

      if ($dados[0]) {

        $usuario = new User();
        $usuario->setId($dados['id']);
        $usuario->setName($dados['name']);
        $usuario->setEmail($dados['email']);
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
        $sess = SessaoSysFile::instanciar();
 
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