<?php
    require_once "auto.php";
    require_once "cabec.php";
    if ($_POST){
       $oper = $_POST["oper"];
       if ($oper == "E"){
           $produto = new produtos($_POST["idp"]);
           $prodDAO = new produtosDAO();
           $prodDAO->excluir($produto);
       } else{
           $erro=0;
           if($_POST["produto"] == ""){
               echo "<script>alert('Preencha o nome do produto')</script>";
               $erro++;
           }
           if($_POST["venda"] == ""){
               echo "<script>alert('Preencha o preço de venda do produto')</script>";
               $erro++;
           }
           if($_POST["custo"] == ""){
               echo "<script>alert('Preencha o preço de custo do produto')</script>";
               $erro++;
           }
           if($_POST["categoria"] == "0"){
               echo "<script>alert('Selecione uma categoria para o produto')</script>";
               $erro++;
           }
           if($erro == 0) {
               switch ($oper) {
                   case "I":
                       $categoria = new categoria($_POST["categoria"]);
                       $produto = new produtos(null, $_POST["produto"], $_POST["venda"], $_POST["custo"], $categoria);
                       $prodDAO = new produtosDAO();
                       $prodDAO->inserir($produto);
                       break;
                   case "A":
                       //$categoria = new categoria($_POST["categoria"]);
                       $produto = new produtos($_POST["idp"], $_POST["produto"], $_POST["venda"], $_POST["custo"], $_POST["categoria"]);
                       $prodDAO = new produtosDAO();
                       $prodDAO->alterar($produto);
                       break;
               }
           }
       }
   }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Order Coffee</title>
        <!--Import Google Icon Font-->
        <link type="text/css" rel="stylesheet" href="../css/normalize.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../css/estilo.css"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <header>
            <nav class="top-nav brown">
                <div class="container">
                    <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
                    <div class="nav-wrapper center"><a class="brand-logo center">Produtos</a></div>
                </div>
            </nav>
            <ul id="slide-out" class="side-nav fixed z-depth-3">
                <li><div class="userView">
                        <div class="background">
                            <img src="../img/bg.png">
                        </div>
                        <span class="white-text name">Order Coffee</span>
                        <?php echo "<span class='white-text email'>Olá, $usuario</span>";?>
                        <br>
                    </div></li>
                <br><br><br><br><br>
                <?php require_once "menu.php";?>
            </ul>
        </header>

        <main>
            <div class="container">
                <div class="row">
                    <table class="striped responsive-table col s12 m12 l12">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Custo</th>
                            <th>Valor</th>
                            <th>Categoria</th>
                            <th colspan = "2">Ações</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                                $prodDAO= new produtosDAO();
                                $listarProduto = $prodDAO->buscarTodos();

                                foreach ($listarProduto as $dado) {
                                    echo "<tr>";
                                    echo "<td>$dado->produto</td>";
                                    echo "<td>".number_format($dado->custo, 2, ',','.')."</td>";
                                    echo "<td>".number_format($dado->valor, 2, ',','.')."</td>";
                                    echo "<td>$dado->categoria</td>";
                                    echo "<td><a class='modal-trigger' onclick='p2({$dado->idp},\"{$dado->produto}\",\"{$dado->custo}\",\"{$dado->valor}\", {$dado->idc})'  href='#inserir' title='Editar'/><i class='material-icons'>edit</i></a></td>";
                                    echo "<td><a class='modal-trigger' onclick='p3({$dado->idp})' href='#excluir'  title='Excluir'><i class='material-icons'>delete_sweep</i></a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <div id="excluir" class="modal col l4">
                        <form method="POST" action="#">
                            <div class="modal-content">
                                <h4 class="red-text">Excluir Produto?</h4>
                                <div class="row">
                                    <div class="input-field col s12 l10">
                                        <input id="oper" name="oper" type="hidden">
                                        <input id="idp" name="idp" type="hidden">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Excluir" class="modal-action modal-close waves-effect waves-green btn-flat"/>
                                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <form id="inserir" class="modal" method="post" action="#">
                        <div class="modal-content">
                            <div class="row">
                                <h4 class="col s12">Cadastrar Produto</h4>
                                <div class="row">
                                    <div class="input-field col s12 l10">
                                        <input id="oper" name="oper" type="hidden">
                                        <input id="idp" name="idp" type="hidden">
                                        <input id="produto" name="produto" placeholder="" type="text">
                                        <label for="produto">Produto:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l5 s12">
                                        <input id="venda" name="venda" placeholder="" type="text">
                                        <label for="venda">Preço de Venda:</label>
                                    </div>
                                    <div class="input-field col l5 s12">
                                        <input id="custo" name="custo" placeholder="" type="text">
                                        <label for="custo">Preço de Custo:</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col l5 s12 l6 input-field">
                                        <select name="categoria" id="select" class="browser-default">
                                            <option value="0" id="0" selected>Selecione uma categoria</option>
                                            <?php
                                                $catDAO = new categoriaDAO();
                                                $retorno = $catDAO->buscarTodas();
                                                foreach ($retorno as $dado) {
                                                    echo "<option value=\"$dado->id_categoria\" id= \"$dado->id_categoria\" > $dado->descricao </option >";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                </div>



                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" value="Salvar">
                            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                        </div>
                    </form>
                    <div class="fixed-action-btn">
                        <a class="modal-trigger btn-floating btn-large brown" onclick="p1()" href="#inserir">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
            </div>
        </main>

        <footer>

        </footer>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/menu.js"></script>
        <script type="text/javascript" src="../js/init.js"></script>
    </body>
</html>
