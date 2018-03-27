<?php
$titulo = "Pesquisa de livros";
include 'cabecalho.php';?>
    <h1>Pesquisar livros</h1>
    <br>
    <form class="form-inline" action="livro-pesquisar.php" method="get">
        <div class="form-group">
            <label for="nome">Descrição: </label>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: A grande caçada" autofocus>
        </div>
        <button type="submit" class="btn btn-primary mb-2">
            <img src="../assets/images/ic_search_white_24px.svg" alt="Pesquisar">
            Pesquisar
        </button>
    </form>

<?php
include '../vendor/autoload.php';
//Verificar se o usuário esta logado
$uDAO = new \App\DAO\UsuarioDAO();
$uDAO->verificar();

if ($_GET['msg'] == 1)    echo "<div class='alert alert-success'>Livro Excluido com Sucesso</div>";

if ($_GET['msg'] == 2)    echo "<div class='alert alert-success'>Livro Alterado com Sucesso</div>";

if ($_GET['msg'] == 3)    echo "<div class='alert alert-success'>Usuário Logado com Sucesso</div>";

$p = new \App\Model\Livro();
isset($_GET['nome']) ? $p->setNome($_GET['nome']) : $p->setNome("");
$pDAO = new \App\DAO\LivroDAO();
$livros = $pDAO->pesquisar($p);

if (count($livros) > 0){
    echo  count($livros)
    ?>

    <table class='table table-striped table-hover'>
        <tr class='text-center'>
            <th>ID</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Isbn</th>
            <th>Usuario</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($livros as $livro) {
            echo "<tr>";
            echo "<td>{$livro->getId()}</td>";
            echo "<td>{$livro->getNome()}</td>";
            echo "<td>{$livro->getQuantidade()}</td>";
            echo "<td>{$livro->getIsbn()}</td>";
            echo "<td>{$livro->getUsuario()}</td>";
            echo "<td><a class='btn btn-danger' href='livro-excluir.php?id={$livro->getId()}'>Excluir </a></td>";
            echo "<td><a class='btn btn-warning' href='livro-alterar.php?id={$livro->getId()}'>Alterar</a></td>";
            echo "<tr>";
        }
        ?>
    </table>
    <?php
}else {
    echo "<div class='alert alert-danger'> Não existem livros cadastrados com esta pesquisa</div>";
}

?>
<?php include 'rodape.php';?>