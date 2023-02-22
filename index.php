<?php

session_start();
$nombre = $_SESSION["nombre"];
$email = $_SESSION["email"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/CSS/index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <title>StarHomes</title>
</head>

<body>

    <!-- NAVBAR -->

    <div id="menu" class="row">

        <div class="col-md-4" id="iconoLogo"><a class="navbar-brand" href="index.php"><img src="/images/starhomes_logo.png" alt="" width="70px" id="imagenLogoIcono"></a></div>


        <nav class="navbar navbar-expand-lg bg-transparent text-center col-md-4" id="navBar">
            <div class="container-fluid">

                <div class="collapse navbar-collapse rounded-pill px-5" id="enlacesInicio">
                    <ul class="navbar-nav fs-3" id="listaEnlaces">
                        <li class="nav-item px-4">
                            <a class="nav-link" aria-current="page" href="index.php"><i class="fa-solid fa-earth-europe px-2" id="tierra"></i>Inicio</a>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="#"><i class="fa-solid fa-shuttle-space px-2" id="nave"></i>Planetas</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="col-md-4" id="iconoLogin"><a class="navbar-brand" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-user-astronaut" id="astronauta"></i></a>
        </div>



    </div>

    <!-- NAVBAR -->

    <!-- ENTRADA -->

    <div id="logoPrincipal"><img src="/images/starhomes_logo.png" alt="" class="slow-spin" id="imagenLogo"></div>

    <br>

    <h1 id="titulo">StarHomes</h1>

    <h3 id="subtitulo">Vive la experiencia de un explorador cósmico</h3>

    <br>

    <div id="jumbotron">

        <p>Bienvenido a Starhomes, la plataforma líder en alquiler de planetas para todos los amantes
            del espacio y la aventura.</p>
        <p>En nuestra plataforma, encontrarás una amplia variedad de planetas disponibles para alquilar, desde pequeñas
            lunas hasta gigantes gaseosos. Cada planeta viene con una descripción detallada de sus características, como
            su tamaño, clima y habitabilidad, así como de su ubicación en la galaxia.</p>

    </div>

    <!-- ENTRADA -->

    <!-- TARJETAS -->

    <div class="row" id="cards">

        <div class="card col-md-4 mx-5" style="width: 25rem; height: 25rem;">
            <h1>1</h1>
            <div class="card-body">

                <p class="card-text">Hazte un explorador intergaláctico creando una cuenta Smarthome.</p>

            </div>
        </div>

        <div class="card col-md-4 mx-5" style="width: 25rem; height: 25rem;">
            <h1>2</h1>
            <div class="card-body">

                <p class="card-text">Busca entre nuestra selección de planetas disponibles.</p>

            </div>
        </div>

        <div class="card col-md-4 mx-5" style="width: 25rem; height: 25rem;">
            <h1>3</h1>
            <div class="card-body">

                <p class="card-text">Paga a la velocidad de la luz a través de nuestra plataforma segura.</p>

            </div>
        </div>

    </div>

    <!-- TARJETAS -->

    <!-- FOOTER -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Información de contacto</p>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> Dirección: 1234 Calle Principal, Jerez de la Fra., España
                        </li>
                        <li><i class="fa fa-phone"></i> Teléfono: +34 123 456 789</li>
                        <li><i class="fa fa-envelope"></i> Correo electrónico: info@starhomes.rocks</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <p>Síguenos en redes sociales</p>
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-facebook"></i>@StarHome</a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i>@StarHome</a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i>@starhome</a></li>
                    </ul>
                </div>
            </div>
        </div>



    </footer>

    <div>
        <h5>Relizado con <i class="fa-solid fa-heart"></i> por:</h5>
        <h5>Aitor Mencaho Vega, Alberto Ortega García y Ramón Felicidade Verdú</h5>
    </div>

    <!-- FOOTER -->

    <!-- NOTIFICACIONES DE REGISTRO, LOGIN, ETC -->

    <?php

    if ($nombre == null || empty($nombre)) {

    ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <section class="border rounded login-dark" style="color: #efc938;--bs-light-rgb: 218,14,251;border-bottom-color: rgb(230,229,222);">

                        <form action="PHP/cliente/inicio.php" class="font-monospace text-center" method="post" style="width: 299px;color: #efc938;--bs-light-rgb: 205,6,255;background: #162d3d;border-radius: 35px;border-top-left-radius: 44px;border-color: rgb(195,182,55);border-bottom-width: 51px;border-bottom-color: rgb(24,127,231);">
                            <legend>Login</legend>
                            <br><br><br>
                            <div class="illustration"><img class="img-fluid slow-spin" src="/images/starhomes_logo.png" width="200"></div>
                            <div class="font-monospace mb-3"></div>
                            <div class="mb-3"><input class="form-control" type="email" name="Email" placeholder="Email" style="font-family: Orbitron, sans-serif;border-color: #efc938;"><input class="form-control" type="password" name="password" placeholder="Contraseña" style="font-family: Orbitron, sans-serif;border-color: #efc938;"></div>
                            <div class="mb-3"><button class="btn btn-primary d-block w-100 botonModal" type="submit" style="font-family: Orbitron, sans-serif;background: #efc938;border-radius: 25px;border-color: var(--bs-yellow);border-top-color: var(--bs-blue);border-right-color: var(--bs-blue);border-bottom: 51px initial rgb(255, 193, 7);border-left-color: rgb(255, 193, 7);color: #162d3d;">Entrar</button>
                                <input class="btn btn-primary d-block w-100 botonModal" data-bs-toggle="modal" data-bs-target="#registro" value="Crear cuenta" type="button" style="font-family: Orbitron, sans-serif;background: #efc938;border-radius: 25px;border-color: var(--bs-yellow);border-top-color: var(--bs-blue);border-right-color: var(--bs-blue);border-bottom: 51px initial rgb(255, 193, 7);border-left-color: rgb(255, 193, 7);color: #162d3d;">
                                </input>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>


    <?php

    } else {

    ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <section class="border rounded login-dark" style="color: #efc938;--bs-light-rgb: 218,14,251;border-bottom-color: rgb(230,229,222);">

                        <form action="PHP/cliente/inicio.php" class="font-monospace text-center" method="post" style="width: 299px;color: #efc938;--bs-light-rgb: 205,6,255;background: #162d3d;border-radius: 35px;border-top-left-radius: 44px;border-color: rgb(195,182,55);border-bottom-width: 51px;border-bottom-color: rgb(24,127,231);">
                            <legend>Perfil</legend>
                            <br><br><br>
                            <div class="illustration"><i class="fa-solid fa-user-astronaut" style="font-size: 200px; margin-bottom: 15%;"></i></div>
                            <div class="mb-3">
                                <h3>Hola, <?php echo $nombre ?></h3>
                            </div>
                            <div class="mb-3"><button class="btn btn-primary d-block w-100 botonModal" type="submit" style="font-family: Orbitron, sans-serif;background: #efc938;border-radius: 25px;border-color: var(--bs-yellow);border-top-color: var(--bs-blue);border-right-color: var(--bs-blue);border-bottom: 51px initial rgb(255, 193, 7);border-left-color: rgb(255, 193, 7);color: #162d3d;">Logout</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>


    <?php

    }

    ?>

    <!-- MODAL REGISTRO -->

    <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="registroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <section class="border rounded login-dark" style="color: #efc938;--bs-light-rgb: 218,14,251;border-bottom-color: rgb(230,229,222);">
                    <form action="PHP/cliente/registro.php" class="font-monospace text-center" method="post" style="width: 299px;color: #efc938;--bs-light-rgb: 205,6,255;background: #162d3d;border-radius: 35px;border-top-left-radius: 44px;border-color: rgb(195,182,55);border-bottom-width: 51px;">
                        <legend>Registro</legend>
                        <br><br><br>
                        <div class="illustration"><img class="img-fluid slow-spin" src="/images/starhomes_logo.png" width="200"></div>
                        <div class="font-monospace mb-3"></div>
                        <div class="mb-3"><input class="form-control" type="text" name="nombre" placeholder="Nombre" style="font-family: Orbitron, sans-serif;border-color: #efc938;"><input class="form-control" type="text" name="apellido" placeholder="Apellidos" style="font-family: Orbitron, sans-serif;border-color: #efc938;"><input class="form-control" type="email" name="Email" placeholder="Email" style="font-family: Orbitron, sans-serif;border-color: #efc938;"><input class="form-control" type="password" name="password" placeholder="Contraseña" style="font-family: Orbitron, sans-serif;border-color: #efc938;"></div>
                        <div class="mb-3"><button class="btn btn-primary d-block w-100 botonModal" type="submit" style="font-family: Orbitron, sans-serif;background: #efc938;border-radius: 25px;border-color: var(--bs-yellow);border-top-color: var(--bs-blue);border-right-color: var(--bs-blue);border-bottom: 51px initial rgb(255, 193, 7);border-left-color: rgb(255, 193, 7);color: #162d3d;">Registrar</button>
                            <input class="btn btn-primary d-block w-100 botonModal" value="Volver al login" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-family: Orbitron, sans-serif;background: #efc938;border-radius: 25px;border-color: var(--bs-yellow);border-top-color: var(--bs-blue);border-right-color: var(--bs-blue);border-bottom: 51px initial rgb(255, 193, 7);border-left-color: rgb(255, 193, 7);color: #162d3d;">
                            </input>

                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <?php

    if ($_REQUEST["error"]) {

    ?>

        <script>
            $(document).ready(function() {
                $('#modalFalloLogin').modal('toggle')
            });
        </script>

        <div class="modal fade" id="modalFalloLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <section class="border rounded falloLogin" style="color: #efc938;--bs-light-rgb: 218,14,251;border-bottom-color: rgb(230,229,222);">
                        <div class="relleno">
                            <div class="illustration"><i class="fa-solid fa-explosion" style="font-size: 200px; margin-bottom: 15%;"></i></div>
                            <div class="font-monospace mb-3"></div>
                            <div class="mb-3">
                                <h2>Las credenciales no se corresponden con ningún usuario registrado</h2>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    <?php

    } else if ($_REQUEST["iniciado"] == true) {

    ?>

        <script>
            $(document).ready(function() {
                $('#modalBienvenido').modal('toggle')
            });
        </script>

        <div class="modal fade" id="modalBienvenido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <section class="border rounded bienvenido" style="color: #efc938;--bs-light-rgb: 218,14,251;border-bottom-color: rgb(230,229,222);">
                        <div class="relleno">
                            <div class="illustration"><i class="fa-solid fa-shuttle-space px-2" id="naveModal"></i></div>
                            <div class="font-monospace mb-3"></div>
                            <div class="mb-3">
                                <h1>BIENVENIDO <?php echo $nombre ?></h1>
                            </div>
                        </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>

    <?php

    }

    ?>

    <!-- NOTIFICACIONES DE REGISTRO, LOGIN, ETC -->

</body>

</html>
