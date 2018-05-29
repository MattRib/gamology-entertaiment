<?php

    session_start();

        if (isset($_POST["bcadastro"])){

            $nome = $_POST['nome'];
            $war  = $_POST['nomeGuerra'];
            $cpf  = $_POST['cpf'];
            $sen  = $_POST['Senha'];
            $nv   = $_POST['nivel'];

            // conexao.
            $serve   = "localhost";
            $usuario = "root";
            $senha   = "";
            $banco   = "db_arranchamento";

            // criando a conexao com o banco de dados.
            // orientada a objetos.
            $conn = new mysqli($serve, $usuario, $senha, $banco);

            // criando a instrução SQL para inserir as informações
            // no banco de dados.
            $sqlcadastro = "INSERT INTO `pessoa`(`nome`, `nomeGuerra`, `cpf`, `Senha`, `nivel`) VALUES (?, ?, ?, ?, ?)";

            // enviando/criando o statement
            $stmtcadastro = $conn->prepare($sqlcadastro);

            $stmtcadastro->bind_param('sssss', $nome, $war, $cpf, $sen, $nv);

            // executando procedimento no banco
            $deubom = $stmtcadastro->execute();

            if ($deubom){
                header('Location:login.php');
            } else {
                echo '<script type="text/javascript">alert("Ocorreu algum erro!!!");</script>';
            }

            // testando se as informações foram inseridas.
            $stmtcadastro->close();
            $conn->close();
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arranchamento</title>
    </head>
    <body>
        <main>
          <center>
              <h2>Cadastro</h2>
              <form class="form-group" action="#" method="post" autocomplete="off">
                      <label for="nome">Nome completo:</label><br>
                      <input class="form-control" type="text" name="nome" maxlength="100" width="110" placeholder="Insira nome completo" autofocus required/><br>
                      <label for="nomeGuerra">Nome guerra:</label><br>
                      <input class="form-control" type="text" name="nomeGuerra" placeholder="Insira nome de guerra" required/><br>
                      <label for="cpf">CPF:</label><br>
                      <input class="form-control" type="text" name="cpf" placeholder="Insira o cpf" required/><br>
                      <label for="Senha">Senha:</label><br>
                      <input class="form-control" type="password" name="Senha" min="8" placeholder="Insira senha" required/><br>
                      <label for="nivel">Posto/Grad:</label><br>
                      <select class="form-control form-control-lg" name="nivel">
                          <option value="Coronel">Coronel</option>
                          <option value="Tenente">Tenente</option>
                          <option value="Sargento">Sargento</option>
                          <option value="Soldado">Soldado</option>
                      </select><br>
                      <input class="btn btn-outline-success" type="submit" name="bcadastro" value="Cadastrar"/>
                      <input class="btn btn-outline-primary" type="reset" name="breset" value="Limpar"/>
              </form>
          </center>
        </main>
    </body>
</html>
