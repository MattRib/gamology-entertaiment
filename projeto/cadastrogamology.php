<?php
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-sacale=1.0">
        <title>Gamology - Welcome</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
    </head>

    <body>
        <header>
            <div class="conteudo">
                <div id="branding">
                    <a href="index.html"><h2>
                            <i style="font-size: 40px;" class="fa fa-gamepad"></i>
                            <span style="text-shadow: 3px 3px red;" class="highlight">Gamology</span> Entertainment&copy;</h2></a>
                </div>
                <!-- NavBar -->
                <nav>
                    <ul>
                        <li class="current">
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="torneio.html">Torneios</a>
                        </li>
                        <li>
                            <a href="#">Quem Somos</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <?php
        if (isset($_POST["bcadastro"])) {

            $nome = $_POST['nome_usuario'];
            $nick = $_POST['nickname_usuario'];
            $cpf = $_POST['cpf_usuario'];
            $email = $_POST['email_usuario'];


            $_SESSION['nome_usuario'] = $nome;
            $_SESSION['nickname_usuario'] = $nick;
            $_SESSION['cpf_usuario'] = $cpf;
            $_SESSION['email_usuario'] = $email;

            // conexao.
            $serve = "localhost";
            $usuario = "root";
            $senha = "";
            $banco = "bd_gamology";

            $conn = new mysqli($serve, $usuario, $senha, $banco);


            // criando a instrução SQL para inserir as informações
            // no banco de dados.
            $sqlcadastro = "INSERT INTO `usuario`(`nome_usuario`, `nickname_usuario`, `cpf_usuario`, `email_usuario`) VALUES ( ?, ?, ?, ?)";

            $stmtcadastro = $conn->prepare($sqlcadastro);

            $stmtcadastro->bind_param('ssss', $nome, $nick, $cpf, $email);

            // executando procedimento no banco
            $deubom = $stmtcadastro->execute();

            if ($deubom) {
                echo '<script type="text/javascript">alert("Inscrito com sucesso");</script>';
                header("location:cartcadgamology.php");
            } else {
                echo '<script type="text/javascript">alert("Ocorreu erro no cadastro!!!");</script>';
                //header("location:cadastrogamology.php");
            }
        }
        ?>
        <main>
            <div class="conteudo">
                <h2>Inscrição para o Torneio</h2>
                <form class="form-group" action="#" method="post" autocomplete="off">                
                    <label for="nome_usuario">Nome completo:</label><br>
                    <input class="form-control" type="text" name="nome_usuario" maxlength="50" size="60" placeholder="Nome completo" autofocus required/><br>
                    <label for="nickname_usuario">Nickname:</label><br>
                    <input class="form-control" type="text" name="nickname_usuario" maxlength="20" size="30" placeholder="Nickname" required/><br>
                    <label for="cpf_usuario">CPF:</label><br>
                    <input class="form-control" type="text" name="cpf_usuario" maxlength="11" size="15" placeholder="Insira o CPF" required/><br>
                    <label for="email_usuario">Email:</label><br>
                    <input class="form-control" type="email" name="email_usuario" maxlength="50" size="60" placeholder="Email" required/><br>
                    <br>
                    <input class="btn btn-outline-success" type="submit" name="bcadastro" value="Cadastrar"/>
                    <input class="btn btn-outline-warning limpar" type="reset" name="breset" value="Limpar"/>                
                </form>
                <br><div><a href="login.php"><button class="btn btn-outline-info">Voltar Para Home</button></a></div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="page-footer font-small mdb-color pt-4 mt-4">

            <!-- Footer Links -->
            <div class="conteudo">

                <!-- Footer links -->
                <div class="row text-center text-md-left mt-3 pb-3">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 style="color:#fff;" class="text-uppercase mb-4 font-weight-bold">Gamology</h6>
                        <p style="color:#fff;text-align:justify;">Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 style="color:#fff" class="text-uppercase mb-4 font-weight-bold">Parceiros</h6>
                        <p><a href="#!"><img width="50px;" src="img/razer.png"/></a></p>
                        <p><a href="#!"><img width="60px;" src="img/aoc.png"/></a></p>
                        <p><a href="#!"><img width="60px;" src="img/hyper.png"/></a></p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 style="color:#fff" class="text-uppercase mb-4 font-weight-bold">Links</h6>
                        <p><a href="login.html">Página do Partcipante</a></p>
                        <p><a href="#!">Torne-se Afiliado</a></p>
                        <p><a href="#!">Deixe Sua Opnião</a></p>
                        <p><a href="#!">Ajuda</a></p>
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 style="color:#fff" class="text-uppercase mb-4 font-weight-bold">Contato</h6>
                        <p style="color:#fff"><i style="color:#fff" class="fa fa-home mr-3"></i> Rio de Janeiro, RJ 10012, BR</p>
                        <p style="color:#fff"><i style="color:#fff" class="fa fa-envelope mr-3"></i> gamology@gmail.com</p>
                        <p style="color:#fff"><i style="color:#fff" class="fa fa-phone mr-3"></i> (21)99606-8504</p>
                        <p style="color:#fff"><i style="color:#fff" class="fa fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Footer links -->

                <hr>

                <!-- Grid row -->
                <div class="row d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-8 col-lg-8">

                        <!--Copyright-->
                        <p style="color:#fff" class="text-center text-md-left">© 2018 Copyright: <a href="https://mdbootstrap.com/bootstrap-tutorial/"><strong> Gamology.com.br</strong></a></p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-4 ml-lg-0">

                        <!-- Social buttons -->
                        <div class="text-center text-md-right">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a class="btn-floating btn-sm rgba-white-slight mx-1"><i class="fa fa-facebook" style="color:#fff"></i></a></li>
                                <li class="list-inline-item"><a class="btn-floating btn-sm rgba-white-slight mx-1"><i class="fa fa-twitter"style="color:#fff"></i></a></li>
                                <li class="list-inline-item"><a class="btn-floating btn-sm rgba-white-slight mx-1"><i class="fa fa-instagram"style="color:#fff"></i></a></li>
                                <li class="list-inline-item"><a class="btn-floating btn-sm rgba-white-slight mx-1"><i class="fa fa-youtube"style="color:#fff"></i></a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

        </footer>
        <!-- Footer -->

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    </body>

</html>

</body>
</html>
