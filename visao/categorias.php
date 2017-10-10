<?php
    require_once "auto.php";
    require_once "cabec.php";
    if($_POST)
    {
        $oper = $_POST["oper"];
        if($oper == "E"){
            $categoria = new categoria($_POST["id"]);
            $categoriaDAO = new categoriaDAO();
            $categoriaDAO->excluir($categoria);
        } else {
            if ($_POST["descricao"] == "")
                echo "Insira a descrição da categoria.";
            else {
                switch ($oper) {
                    case "I":
                        $categoria = new categoria(null, $_POST["descricao"]);
                        $categoriaDAO = new categoriaDAO();
                        $categoriaDAO->inserir($categoria);
                        break;
                    case "A":
                        $categoria = new categoria($_POST["id"], $_POST["descricao"]);
                        $categoriaDAO = new categoriaDAO();
                        $categoriaDAO->editar($categoria);
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
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--Import Google Icon Font-->
    <link type="text/css" rel="stylesheet" href="../css/normalize.css"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/estilo.css"/>
      <script type="text/javascript" src="../js/init.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

    <header>
      <nav class="top-nav brown">
        <div class="container">
          <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
          <div class="nav-wrapper center"><a class="brand-logo center">Categorias</a></div>
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
      <div>
          <div class="container">
            <table class="striped centered responsive-table" id="tabela">
              <thead>
                <tr>
                    <th>Descrição</th>
                    <th colspan = "2">Ações</th>
                </tr>
              </thead>

              <tbody>
                <?php
                    require_once "auto.php";
                    $catDAO = new categoriaDAO();
                    $retorno = $catDAO->buscarTodas();
                    foreach ($retorno as $dado) {
                        echo "<tr>";
                        echo "<td>{$dado->descricao}</td>";
                        echo "<td><a class='modal-trigger' onclick='c2({$dado->id_categoria},\"{$dado->descricao}\")'  href='#inserir' title='Editar'/><i class='material-icons'>edit</i></a></td>";
                        echo "<td><a class='modal-trigger' onclick='c3({$dado->id_categoria})' href='#excluir'  title='Excluir'><i class='material-icons'>delete_sweep</i></a></td>";
                        echo "</tr>";
                    }
                ?>
              </tbody>
          </table>
          </div>

          <div class="row">
            <div class="container">
                <!-- Modal Structure -->
                <div id="inserir" class="modal">
                    <form method="POST" action="#">
                        <div class="modal-content">
                            <h4>Cadastrar Categoria</h4>
                            <div class="row">
                                <div class="input-field col s12 l10">
                                    <input id="oper" name="oper" type="hidden">
                                    <input id="id" name="id" type="hidden">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 l10">
                                    <input id="desc" placeholder="" name="descricao" type="text"/>
                                    <label for="descricao">Descrição:</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Salvar" class="modal-action modal-close waves-effect waves-green btn-flat"/>
                            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <div class="row">
              <div class="container">
                  <!-- Modal Structure -->
                  <div id="excluir" class="modal col l4">
                      <form method="POST" action="#">
                          <div class="modal-content">
                              <h4 class="red-text">Excluir Categoria?</h4>
                              <div class="row">
                                  <div class="input-field col s12 l10">
                                      <input id="oper" name="oper" type="hidden">
                                      <input id="id" name="id" type="hidden">
                                  </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <input type="submit" value="Excluir" class="modal-action modal-close waves-effect waves-green btn-flat"/>
                              <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="fixed-action-btn">
            <a class="modal-trigger btn-floating btn-large brown" onclick="c1()" href="#inserir">
              <i class="material-icons">add</i>
            </a>
          </div>
        </div>
    </main>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
  </body>
</html>