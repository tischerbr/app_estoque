<?php
$titulo = "Alteração de livros";
include 'cabecalho.php';?>
<h1>Alterar livro</h1>
<?php
include '../vendor/autoload.php';
//Verificar se o usuário esta logado
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();
if ($_POST){

        $p2 = new  \App\Model\Livro();
        $p2->setId($_POST['id']);
        $p2->setNome($_POST['nome']);
        $p2->setQuantidade(\App\Helper\Moeda::set($_POST['quantidade']));
        $p2->setIsbn($_POST['isbn']);
        $p2->setData($_POST['data']);

       $p2DAO = new \App\DAO\LivroDAO();
    if ($p2DAO->alterar($p2))    header("Location: livro-pesquisar.php?msg=2");
}
$p = new  \App\Model\Livro();
isset($_GET) ? $p->setId($_GET['id']) :  $p->setId($_POST['id']) ;
$pDAO = new \App\DAO\LivroDAO();
$resultado = $pDAO->pesquisarUM($p);
?>
    <form action="livro-alterar.php" method="post">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" class="form-control" value="<?php echo $resultado['id'];?>" >
        </div>


        <div class="form-group">
            <label for="nome"><span class="text-danger">*</span> Nome</label>
            <input type="text" id="nome" name="nome" required autofocus class="form-control" value="<?php echo $resultado['nome'];?>">
        </div>

        <div class="form-group">
            <label for="quantidade"><span class="text-danger">*</span> Quantidade</label>
            <input type="text" id="quantidade" name="quantidade" required class="form-control" value="<?php echo $resultado['quantidade'];?>">
        </div>



        <div class="form-group">
            <label for="valor">ISBN</label>
            <input type="text" id="isbn" name="isbn" class="form-control" value="<?php echo $resultado['isbn'];?>">
        </div>
        <div class="form-group">
            <label for="validade">Data</label>
            <input type="date" id="validade" name="data" class="form-control" value="<?php echo $resultado['data'];?>">
        </div>

        <div class="form-group">
            Os campos com <span class="text-danger">*</span> não podem estar em branco.
        </div>
        <button type="submit" class="btn btn-success">
            <img src="../assets/images/ic_done_white_24px.svg" alt="Alterar o livro"> Alterar
        </button>
    </form>
<?php include 'rodape.php';?>