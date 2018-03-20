<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 26/02/2018
 * Time: 13:43
 */

namespace App\Model;

class Produto
{
    private $id;
    private $nome;
    private $quantidade;
    private $isbn;
    private $data;

    private $categoria;
    private $autores;

    private $usuario;


    public function __construct($id=NULL,    $nome=NULL,    $quantidade=null,    $isbn=NULL,    $data=null,
                                array $categorias=NULL , array $autores=NULL,
                                Usuario $usuario=NULL) {
        $this->id = $id;
        $this->nome = $nome;
        $this->quantidade = $quantidade;

        $this->isbn = $isbn;
        $this->data = new DateTime();

        $this->autores = $autores;
        $this->categorias = $categorias;

        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }




    /**
     * Gets the suer of this post
     *
     * @return Usuario The user that insert the book
     */
    public function getUsuario() {
        return $this->usuario;
    }
    /**
     * Sets the author of this post
     *
     * @param Usuario $usuario the user that create the book
     * @return void
     */
    public function setUsuario(Usuario $usuario) {
        $this->usuario = $usuario;
    }




    /**
     * Gets the list of categories of this book
     *
     * @return mixed The list of categories of this book
     */
    public function getCategorias() {
        return $this->categorias;
    }
    /**
     * Sets the categories of the book
     *
     * @param mixed $categorias the categories list of this book
     * @return void
     */
    public function setCategorias(array $categorias) {
        $this->categorias = $categorias;
    }


    /**
    * Gets the list of authors of this book
    *
    * @return mixed The list of authors of this book
    */
    public function getAutores() {
        return $this->autores;
    }
    /**
    * Sets the comments of the post
    *
    * @param mixed $autores the authors list of this book
    * @return void
    */
    public function setAutores(array $autores) {
        $this->autores = $autores;
    }


}