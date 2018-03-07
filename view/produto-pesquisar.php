<?php
$titulo = "Pesquisa de produtos";
include 'cabecalho.php';?>
<h1>Pesquisar produtos</h1>
<br>
<form class="form-inline" action="produto-pesquisar.php" method="get">
    <div class="form-group">
        <label for="descricao">Descrição: </label>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Ex.: Sabão em pó" autofocus>
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

if ($_GET['msg'] == 1)    echo "<div class='alert alert-success'>Produto Excluido com Sucesso</div>";

if ($_GET['msg'] == 2)    echo "<div class='alert alert-success'>Produto Alterado com Sucesso</div>";

if ($_GET['msg'] == 3)    echo "<div class='alert alert-success'>Usuário Logado com Sucesso</div>";

$p = new \App\Model\Produto();
isset($_GET['descricao']) ? $p->setDescricao($_GET['descricao']) : $p->setDescricao("");
$pDAO = new \App\DAO\ProdutoDAO();
$produtos = $pDAO->pesquisar($p);
if (count($produtos) > 0){
?>
    <table class='table table-striped table-hover'>
        <tr class='text-center'>
            <th>ID</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Valor</th>
            <th>Validade</th>
            <th></th>
            <th></th>
        </tr>
        <?php
         foreach ($produtos as $produto) {
             echo "<tr>";
             echo "<td>{$produto->getId()}</td>";
             echo "<td>{$produto->getDescricao()}</td>";
             echo "<td>{$produto->getQuantidade()}</td>";
             echo "<td>{$produto->getValor()}</td>";
             echo "<td>{$produto->getValidade()}</td>";
             echo "<td><a class='btn btn-danger' href='produto-excluir.php?id={$produto->getId()}'>Ecluir </a></td>";
             echo "<td><a class='btn btn-warning' href='produto-alterar.php?id={$produto->getId()}'>Alterar</a></td>";
             echo "<tr>";
        }
        ?>
    </table>
    <?php
    }else {
        echo "<div class='alert alert-danger'> Não existem produtos cadastrados com esta pesquisa</div>";
    }

?>
<?php include 'rodape.php';?>