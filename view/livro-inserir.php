<?php
$titulo = "Cadastro de livros";
include 'cabecalho.php';?>
<h1>Cadastrar novo Livro</h1>
<?php
include '../vendor/autoload.php';

//Verificar se o usuário esta logado
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();

if ($_POST) {
    $p = new \App\Model\Livro();

    $p->setNome($_POST['nome']);
    $p->setQuantidade($_POST['quantidade']);
    $p->setIsbn($_POST['isbn']);
    $p->setData($_POST['data']);

    $pDAO = new \App\DAO\LivroDAO();
    if ($pDAO->inserir($p)){
        echo "<div class='alert alert-success'>Livro Cadastrado com Sucesso</div>";
    }
}
 ?>

<form action="livro-inserir.php" method="post">

    <div class="form-group">
        <label for="nome"><span class="text-danger">*</span> Nome</label>
        <input type="text" id="nome" name="nome" class="form-control" autofocus required>
    </div>

    <div class="form-group">
        <label for="quantidade"><span class="text-danger">*</span> Quantidade</label>
        <input type="text" id="quantidade" name="quantidade" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="isbn"><span class="text-danger">*</span> ISBN</label>
        <input type="text" id="isbn" name="isbn" class="form-control" autofocus required>
    </div>

    <div class="form-group">
        <label for="validade">Data</label>
        <input type="date" id="data" name="data" class="form-control">
    </div>

    <div class="form-group">
        Os campos com <span class="text-danger">*</span> não podem estar em branco.
    </div>
    <button type="submit" class="btn btn-success">
        <img src="../assets/images/ic_done_white_24px.svg" alt="Cadastrar o livro"> Cadastrar
    </button>
</form>
<?php include 'rodape.php';?>