<?php
session_start();
$nombre = $_SESSION["nombre"];
$email = $_SESSION["email"];
$idCliente = $_SESSION["idCliente"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.2.6/dist/sweetalert2.all.min.js" integrity="sha256-Ry2q7Rf2s2TWPC2ddAg7eLmm7Am6S52743VTZRx9ENw=" crossorigin="anonymous"></script>


    <!-- Estilos -->
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/planetas.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>StarHomes</title>

    <script>
        window.onload = ini

        function ini() {
            document.getElementById("buscaPlanetas").addEventListener("keyup", buscarPlaneta);
            buscarPlaneta()
        }

        function buscarPlaneta() {

            var name = document.getElementById("buscaPlanetas");
            var planetasInfo = document.getElementById("planetasInfo");

            planetasInfo.innerHTML = "";

            $.ajax({
                method: 'GET',
                url: `https://api.api-ninjas.com/v1/planets?name=${name.value}`,
                headers: {
                    'X-Api-Key': 'nCRnIcIOcowWRGKbceSJPA==SlJ7wQETIwo85LHm'
                },
                contentType: 'application/json',
                success: function(resultadoPlanetas) {

                    resultadoPlanetas.forEach((element, index) => {

                        var valor = Math.floor(1000 + Math.random() * 9000);

                        var div = document.createElement("div");
                        div.className = "planeta";
                        div.innerHTML += `<strong>Nombre: </strong><p> ${element.name} </p>`;
                        div.innerHTML += "<br/>";
                        div.innerHTML += `<strong>Precio la noche:</strong> <p> ${valor} € </p>`;
                        div.innerHTML += "<br/>";
                        div.innerHTML += `<button class="btn alquila" data-id="${index}" data-precio="${valor}" >Alquilar</button>`
                        planetasInfo.appendChild(div);

                    });

                    <?php

                    if ( $idCliente == '' || $idCliente == null ) {
                        
                    ?>
                        
                        $("#exampleModal").modal("show");

                    <?php

                    } else {

                    ?>

                        // Obtener los botones y agregar el evento click
                        var buttons = document.querySelectorAll(".btn.alquila");
                        buttons.forEach(button => {
                            button.addEventListener("click", async function() {

                                var planeta = document.createElement("div");
                                var planetId = this.getAttribute("data-id");
                                var precio = this.getAttribute("data-precio");
                                var planetName = resultadoPlanetas[planetId].name;

                                await Swal.fire({

                                    title: `<span style="color: #efc938">Alquilar ${planetName}</span>`,
                                    html: `<span style="font-weight: bold; color: #efc938">Precio por noche: ${precio} €</span> 
                                        <br/> 
                                        <label style="color: #efc938">Desde: </label><input id="fechaIda" name="fechaIda" placeholder="Fecha de entrada" readonly class="inputFecha"/> 
                                        <br/> 
                                        <label style="color: #efc938">Hasta: </label><input id="fechaVuelta" name="fechaVuelta" placeholder="Fecha de salida" readonly class="inputFecha"/> 
                                        <br/> 
                                        <label style="color: #efc938">Cantidad de personas: </label><input class="inputFecha" type="number" id="personas" name="personas" placeholder="0" min="1" max="10"/>`,
                                    onOpen: function() {
                                        var dateFormat = "dd-mm-yy",
                                            from = $("#fechaIda")
                                            .datepicker({
                                                defaultDate: "+1w",
                                                changeMonth: true,
                                                numberOfMonths: 1,
                                                dateFormat: dateFormat
                                            })
                                            .on("change", function() {
                                                to.datepicker("option", "minDate", getDate(this));
                                            }),
                                            to = $("#fechaVuelta").datepicker({
                                                defaultDate: "+1w",
                                                changeMonth: true,
                                                numberOfMonths: 2,
                                                dateFormat: dateFormat
                                            })
                                            .on("change", function() {
                                                from.datepicker("option", "maxDate", getDate(this));
                                            });

                                        function getDate(element) {
                                            var date;
                                            try {
                                                date = $.datepicker.parseDate(dateFormat, element.value);
                                            } catch (error) {
                                                date = null;
                                            }
                                            return date;
                                        }
                                    },
                                    showCancelButton: true,
                                    confirmButtonText: 'Alquilar',
                                    cancelButtonText: 'Ver más planetas',
                                    confirmButtonColor: '#efc938',
                                    cancelButtonColor: '#d33',
                                    width: '50rem',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    background: '#162d3d',


                                }).then((willDelete) => {

                                        console.log(willDelete.value)

                                        if (willDelete.value) {

                                            const fechaIda = document.getElementById("fechaIda").value
                                            const fechaVuelta = document.getElementById("fechaVuelta").value
                                            const personas = document.getElementById("personas").value

                                            $.ajax({
                                                method: 'POST',
                                                url: '../PHP/servidor/alquilar.php',
                                                data: {
                                                    planetName: planetName,
                                                    fechaIda: fechaIda,
                                                    fechaVuelta: fechaVuelta,
                                                    personas: personas,
                                                    precio: precio
                                                },
                                                success: function(result) {

                                                    if (result == "ok") {

                                                        Swal.fire({
                                                            title: '<span style="color: #efc938">¡Alquilado!</span>',
                                                            text: 'El planeta se ha alquilado correctamente',
                                                            confirmButtonColor: '#efc938',
                                                            background: '#162d3d',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                window.location.href = "index.php";
                                                            }
                                                        })

                                                    } else if (result == "pasada") {

                                                        Swal.fire({
                                                            title: '<span style="color: #efc938">Oooh...</span>',
                                                            text: 'Parece que estás cogiendo una fecha que ya ha pasado.',
                                                            confirmButtonColor: '#efc938',
                                                            background: '#162d3d',
                                                        })

                                                    } else if (result == "cogido") {

                                                        Swal.fire({
                                                            title: '<span style="color: #efc938">vaya...</span>',
                                                            text: 'Parece se han adelantado y ya no están disponibles.',
                                                            confirmButtonColor: '#efc938',
                                                            background: '#162d3d',
                                                        })

                                                    } else {

                                                        Swal.fire({
                                                            title: '<span style="color: #efc938">Oops...</span>',
                                                            text: 'Rellene los campos correctamente o te la mamas.',
                                                            confirmButtonColor: '#efc938',
                                                            background: '#162d3d',
                                                        })

                                                    }
                                                },
                                                error: function ajaxError(jqXHR) {
                                                    console.error('Error: ', jqXHR.responseText);
                                                }
                                            })

                                        }
                                    }


                                )

                                document.body.appendChild(planeta);

                            });

                        });

                    <?php
                    }
                    ?>

                },
                error: function ajaxError(jqXHR) {
                    console.error('Error: ', jqXHR.responseText);
                }
            });

        }
    </script>

</head>

<body>

    <!-- NAVBAR -->

    <div id="menu" class="row">

        <div class="col-md-4" id="iconoLogo"><a class="navbar-brand" href="../index.php"><img src="../images/starhomes_logo.png" alt="" width="70px" id="imagenLogoIcono"></a></div>


        <nav class="navbar navbar-expand-lg bg-transparent text-center col-md-4" id="navBar">
            <div class="container-fluid">

                <div class="collapse navbar-collapse rounded-pill px-5" id="enlacesInicio">
                    <ul class="navbar-nav fs-3" id="listaEnlaces">
                        <li class="nav-item px-4">
                            <a class="nav-link" aria-current="page" href="../index.php"><i class="fa-solid fa-earth-europe px-2" id="tierra"></i>Inicio</a>
                        </li>
                        <li class="nav-item px-4">
                            <a class="nav-link" href="/Paginas/planetas.php"><i class="fa-solid fa-shuttle-space px-2" id="nave"></i>Planetas</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="col-md-4" id="iconoLogin"><a class="navbar-brand" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-user-astronaut" id="astronauta"></i></a>
        </div>

    </div>

    <!-- NAVBAR -->

    <!-- PLANETAS -->
    <div class="buscador">
        <h1>¿Que planeta quieres visitar hoy?</h1>
        <input type="text" name="planeta" id="buscaPlanetas" placeholder="Busca el planeta" value="" />
    </div>
    <div id="planetasInfo"></div>
    <!-- PLANETAS -->

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

        <!-- MODAL LOGIN -->

    <?php

    if ($nombre == null || empty($nombre)) {

    ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <section class="border rounded login-dark" style="color: #efc938;--bs-light-rgb: 218,14,251;border-bottom-color: rgb(230,229,222);">

                        <form action="../PHP/cliente/inicio.php" class="font-monospace text-center" method="post" style="width: 299px;color: #efc938;--bs-light-rgb: 205,6,255;background: #162d3d;border-radius: 35px;border-top-left-radius: 44px;border-color: rgb(195,182,55);border-bottom-width: 51px;border-bottom-color: rgb(24,127,231);">
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

                        <form action="../PHP/conexion/cierraSesion.php" class="font-monospace text-center" method="post" style="width: 299px;color: #efc938;--bs-light-rgb: 205,6,255;background: #162d3d;border-radius: 35px;border-top-left-radius: 44px;border-color: rgb(195,182,55);border-bottom-width: 51px;border-bottom-color: rgb(24,127,231);">
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

    <!-- MODAL LOGIN -->

    <div>
        <h5>Relizado con <i class="fa-solid fa-heart"></i> por:</h5>
        <h5>Aitor Mencaho Vega, Alberto Ortega García y Ramón Felicidade Verdú</h5>
    </div>

    <!-- FOOTER -->

</body>

</html>
