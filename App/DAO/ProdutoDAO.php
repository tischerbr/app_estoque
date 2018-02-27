<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 26/02/2018
 * Time: 13:43
 */

namespace App\DAO;


class ProdutoDAO extends Conexao
{
    public function inserir($produto)
    {

        $sql = "insert into produtos (descricao, quantidade, valor, validade) values (:descricao, :quantdade, :valor, :validade)";

        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue( ":descricao", $produto->getDescricao());
            $i->bindValue( ":quantidade", $produto->getDescricao());
            $i->bindValue( ":valor", $produto->getDescricao());
            $i->bindValue( ":validade", $produto->getDescricao());
            $i->execute();


        } catch (\PDOException $e){
            echo "<div class='alert alert-danger'> ($e->getMessage()}</div>div>";
        }
    }
}