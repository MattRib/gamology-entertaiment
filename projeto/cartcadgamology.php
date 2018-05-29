<?php session_start() ?>

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







        <main>

            <script>
                function cont() {
                    var conteudo = document.getElementById('print').innerHTML;
                    tela_impressao = window.open('about:blank');
                    tela_impressao.document.write(conteudo);
                    tela_impressao.window.print();
                    tela_impressao.window.close();
                }
            </script>

            <div class="conteudo" style="margin-top: 85px;">
                <form id="print" class="card">
                    <div class="card-body">
                        <h1 class="card-header">Cartão de Inscrição</h1>
                        <div>
                            <?php echo "Parabens por se inscrever  " . $_SESSION['nickname_usuario']; ?>
                        </div>
                        <h2>Torneio de alguma coisa/2018</h2>
                        <br>


                        <?php
                        $serve = "localhost";
                        $usuario = "root";
                        $senha = "";
                        $banco = "bd_gamology";

                        $conn = mysqli_connect($serve, $usuario, $senha, $banco);

                        $nickname = $_SESSION['nickname_usuario'];

                        $sel = "SELECT id_usuario, nome_usuario, nickname_usuario FROM usuario WHERE nickname_usuario='$nickname'";

                        $conx = mysqli_query($conn, $sel);

                        while ($row = mysqli_fetch_assoc($conx)) {
                            ?>

                            <label>Número da inscrição: </label><?= $row['id_usuario'] ?>"<br>
                            <label>Nome completo: </label><?= $row['nome_usuario'] ?><br>
                            <label>Nickname: </label><?= $row['nickname_usuario'] ?><br>

                        <?php } ?>                    

                        </form>
                    </div>
            </div>
            <button class="btn btn-outline-dark" style="margin-left: 170px; margin-top: 20px;" onclick="cont();">Imprimir</button>
            <a href="index.html"><button style="margin-top: 20px;" type="submit" class="btn btn-outline-primary">Voltar Para Home</button></a>

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
