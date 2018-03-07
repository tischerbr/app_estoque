<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 26/02/2018
 * Time: 13:43
 */

namespace App\DAO;


class UsuarioDAO extends Conexao
{

    public function login($usuario)
    {
        $sql = "select * from usuarios where email = :email and senha = :senha";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue( ":email", $usuario->getEmail());
            $i->bindValue( ":senha", \App\Helper\Senha::gerar($usuario->getSenha()));
            $i->execute();
            $resultado  =  $i->fetch();
            session_start();
            $_SESSION['id'] = $resultado['id'];
            return $i;
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'>($e->getMessage()}</div>div>";
        }
    }

    public function logoff()
    {
        session_start();
        unset($_SESSION['id']);
        session_destroy();
        header("Location: login.php");
    }

    public function verificar()
    {
          session_start();
          if (empty($_SESSION['id']))
            header("Location: login.php");
    }
}