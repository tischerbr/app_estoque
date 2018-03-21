<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 26/02/2018
 * Time: 13:43
 */

namespace App\DAO;


class LivroDAO extends Conexao
{
    public function inserir($livro)
    {

        $sql = "insert into livros (nome, quantidade, isbn, data, usuario_id) values (:nome, :quantidade, :isbn, :data, :usuario_id)";

        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue( ":nome", $livro->getNome());
            $i->bindValue( ":quantidade", $livro->getQuantidade());
            $i->bindValue( ":isbn", $livro->getIsbn());
            $i->bindValue( ":data", $livro->getData());
            $i->execute();
            return true;
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'> ($e->getMessage()}</div>div>";
        }
    }

    public function pesquisar($livro = null)
    {
        $sql = "select id, nome, quantidade, isbn, data, usuario_id from livros where nome like :nome";
        try{
        $i = $this->conexao->prepare($sql);
        $i->bindValue( ":nome", "%" . $livro->getNome() . "%");
        $i->execute();
        return $i->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Livro");
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'> ($e->getMessage()}</div>div>";
        }
    }

    public function excluir($livro)
    {

        $sql = "delete from livros where id = :id";

        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue( ":id", $livro->getId() );
            $i->execute();
            return $i->fetchAll(\PDO::FETCH_CLASS, "\App\Model\Livro");
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'> ($e->getMessage()}</div>div>";
        }
    }

    public function pesquisarUM($livro)
    {

        $sql = "select * from livros where id = :id";

        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue( ":id", $livro->getId() );
            $i->execute();
            return $i->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'> ($e->getMessage()}</div>div>";
        }
    }


    public function alterar($livro)
    {

        $sql = "update livros set nome = :nome, quantidade = :quantidade, isbn = :isbn, data = :data where id = :id";

        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue( ":id", $livro->getId());
            $i->bindValue( ":nome", $livro->getNome());
            $i->bindValue( ":quantidade", $livro->getQuantidade());
            $i->bindValue( ":isbn", $livro->getIsbn());
            $i->bindValue( ":data", $livro->getData());
            $i->execute();
            return true;
        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'> ($e->getMessage()}</div>div>";
        }
    }


}