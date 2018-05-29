<?php session_start() ?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
    </head>

    <body>
        <header>
            
        </header>
        <div> <?php echo "Bem vindo " . $_SESSION['posto'] . " " . $_SESSION['usuario'];?>
        
        
        </div>
        <main>  
            <h1>Usuários Cadastrados</h1>
            <a href="cadastro.php">Cadastrar usuário</a>
            <br>
            <table>
                <tr>                    
                    <th>Nome completo</th>
                    <th>Nome de Guerra</th>
                    <th>Post/Grad</th>
                    <th>Excluir</th>
                </tr>
                <?php
                
                    require_once("conexao.php");

                    $sel = "SELECT idPessoa, nome, nomeGuerra, nivel FROM pessoa";
                    $conx = mysqli_query($conn, $sel);
                    
                    while ($row = mysqli_fetch_assoc($conx)) {
                        echo '<tr>';
                        //echo '<td>'. $post['clienteID'] . '</td>';
                        echo '<td><a href="alterarusuario.php?clienteID='.
                                     $row['idPessoa']    . '">' .
                                     $row['nome'] . '</a></td>';
                        echo '<td>'. $row['nomeGuerra']      . '</td>';
                        echo '<td>'. $row['nivel']        . '</td>';
                        echo '<td><a href="excluirusuario.php?clienteID=' .
                                     $row['idPessoa'] . '">Excluir</a></td>';
                        echo '</tr>';
                    }
                   
                ?>
            </table>            
        </main>

        <footer>
            
        </footer>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conn);
    session_destroy();
?>