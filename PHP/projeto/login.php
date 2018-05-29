<?php

    //iniciando a sessão
    session_start();

    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');   

   if (isset($_POST["blogar"])){
       
    $serv    = "localhost";
    $usuario = "root";
    $senha   = "";
    $banco   = "db_arranchamento";
    
    $conn = mysqli_connect($serv, $usuario, $senha, $banco);
    
    $us = $_POST['usuario'];
    $pw = $_POST['senha'];
    
    
    $sql = "SELECT * " .
           "FROM pessoa " .
           "WHERE cpf = '" . $us . "' AND " . 
           "Senha = '" . $pw . "';";    
    
    $hop  = mysqli_query($conn, $sql);  
    
    $user = mysqli_fetch_assoc($hop);
    
        
    
    if (!$user){
        
        echo "<script type='text/javascript'>alert('usuário ou senha incorretos');</script>";
    } else {
        $_SESSION["usuario"] = $user["nomeGuerra"];
        $_SESSION["posto"]   = $user["nivel"];
        header("location:listausuario.php");
       
    }
     
   }        
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arranchamento</title>
             
    </head>
    <body> 
        <form action="#" method="post">
            <h2>Efetue seu login</h2>
                <input type="text"     name="usuario" placeholder="Usuário"   />
                <input type="password" name="senha"   placeholder="Senha" />
                <input type="submit"   name="blogar"  value="LOGIN"            />
        </form>
    </body>
</html>
 



            
        
          
        
    


