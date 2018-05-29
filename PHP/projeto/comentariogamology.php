<?php

    session_start();
    
        if (isset($_POST["bcad"])){
        
            $nick_com  = $_POST['nick_comentario'];
            $text_com  = $_POST['texto_comentario'];
                        
            // conexao.
            $serve   = "localhost";
            $usuario = "root";
            $senha   = "";
            $banco   = "bd_gamology";

            // criando a conexao com o banco de dados.
            // orientada a objetos.
            $conn = new mysqli($serve, $usuario, $senha, $banco);
            
            // criando a instrução SQL para inserir as informações
            // no banco de dados.
            $sqlcadastro = "INSERT INTO `comentario`(`nick_comentario`, `texto_comentario`) VALUES (?, ?)";
            
            // enviando/criando o statement 
            $stmtcadastro = $conn->prepare($sqlcadastro); 

            $stmtcadastro->bind_param('ss', $nick_com, $text_com);

            // executando procedimento no banco
            $deubom = $stmtcadastro->execute();
            
            if ($deubom){
                echo '<script type="text/javascript">alert("Comentou com sucesso");</script>';
            } else {
                echo '<script type="text/javascript">alert("Ocorreu algum erro ao cadastrar!!!");</script>';
            }
            
            // testando se as informações foram inseridas.                    
            $stmtcadastro->close();
            $conn->close();
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gamology</title>
    </head>
    <body>
        <main>            
            <h2>Comente</h2>
                <form action="#" method="post" autocomplete="off">                
                    <label for="nick_comentario">Nickname:</label><br>
                    <input type="text" name="nick_comentario" maxlength="20" size="60" placeholder="Nome completo" autofocus required/><br>
                    <label for="texto_comentario">Comentário:</label><br>                    
                    <textarea name="texto_comentario" maxlength="400" rows="06" cols="50" placeholder="Comentário" required></textarea>
                    <br>
                    <input type="submit" name="bcad" value="Comentar"/>
                    <input type="reset" name="breset" value="Limpar"/>                
                </form>            
        </main>
    </body>
</html>
