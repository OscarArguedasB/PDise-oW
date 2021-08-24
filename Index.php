<!DOCTYPE html>
<html>

<head>
    <title>DevSite</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="css/ICONO.JPG">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="#home" class="w3-bar-item w3-button"><b>DEV</b>SITE</a>
            <div class="w3-right w3-hide-small">
                <a href="#inSesion" class="w3-bar-item w3-button">Iniciar sesion</a>
                <a href="#" onclick="document.getElementById('registrarse').style.display='block'" class="w3-bar-item w3-button">Registrarse</a>
                <a href="#solCon" class="w3-bar-item w3-button">Contactenos</a>
            </div>
        </div>
    </div>
    <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home"></header>
    <br>
    <br>
    <!-- IMAGEN INTRO -->
    <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
        <img class="w3-image" src="css/INTRODUCCION.jpg" alt="INTRO" width="1500" height="500">
        <div class="w3-display-middle w3-margin-top w3-center">
            <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>DEV</b></span>
                <span class="w3-hide-small w3-text-light-grey"><b>SITE</b></span>
            </h1>
            <p class="Sub">Empresa de desarrollo web</p>
        </div>
    </header>
    <!-- SOBRE NOSOTROS -->
    <div class="w3-container w3-padding-32">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Sobre nosotros</h3>
        <p>DEVSITE es una empresa dedicada al desarrollo de software y a brindar soluciones, nuestros clientes son
            contactados por nuestros desarrolladores una vez
            hecha la solicitud para conocer todos los detalles del proyecto que el cliente desea que se realice, dandole
            una atención completa donde se integra al
            cliente por completo en cada una de las etapas del desarrollo del proyecto, haciendoles sentir parte de
            nuesto equipo de desarrolladores.</p>
    </div>
    </div>
    <!-- PROYECTOS -->
    <div class="w3-content w3-padding" style="max-width:1564px">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Proyectos</h3>
        <p>Algunas de las ideas de proyectos que ya hemos realizado.</p>
    </div>
    <div class="w3-row-padding">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Analítica</div>
                <img src="css/P_ANALITICA.JPG" alt="proyecto" style="width:100%">
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Cafetería</div>
                <img src="css/P_CANFETERIA.JPG" alt="proyecto" style="width:100%">
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Empresa remodelaciones</div>
                <img src="css/P_COMPAÑIA REMODELACION.JPG" alt="proyecto" style="width:100%">
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Marketing</div>
                <img src="css/P_MARKETIN.JPG" alt="proyecto" style="width:100%">
            </div>
        </div>
    </div>
    <div class="w3-row-padding">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Renta apartamento</div>
                <img src="css/P_RENTAAPART.JPG" alt="proyecto" style="width:99%">
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Reserva viajes</div>
                <img src="css/P_RESERVIAJE.JPG" alt="proyecto" style="width:99%">
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Restaurante</div>
                <img src="css/P_RESTA.JPG" alt="proyecto" style="width:99%">
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-display-container">
                <div class="w3-display-topleft w3-black w3-padding">Menu</div>
                <img src="css/P_MENURESTA.JPG" alt="proyecto" style="width:99%">
            </div>
        </div>
    </div>
    </div>

    <!-- Solicitud -->
    <div class="w3-container w3-padding-32" id="solCon">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contactenos</h3>
        <p>Complete la siguiente informacion para ser contactado por uno de nuestros desarrolladores.</p>
        <form action="/action_page.php" target="_blank">
            <input class="w3-input w3-border" type="text" placeholder="Nombre" required name="Nombre">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Correo" required name="Correo">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Teléfono" required name="Teléfono">
            <p>Comentanos ¿en qué podemos ayudar?</p>
            <input class="w3-input w3-section w3-border" type="text" placeholder="Descripcion" required name="Descripcion">
            <button class="w3-button w3-black w3-section" type="submit">
                <i class="fa fa-paper-plane"></i>ENVIAR SOLICITUD</button>
        </form>
    </div>
    </div>

    <!-- Registrarse -->
    <div id="registrarse" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom">
            <div class="w3-container w3-black">
                <span onclick="document.getElementById('registrarse').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                <h1>Registrarse</h1>
            </div>
            <div class="w3-container" id="formRegistro">
                <form id="registro" method="POST">
                    <p>Complete todos los espacios para registrarse:</p>
                    <p><input type="radio" id="tipoEmpresa" name="tipo" value="1" required> Empresa
                        <input type="radio" id="tipoPersona" name="tipo" value="2" required> Persona
                    </p>
                    <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre" id="nombre" name="nombre" required></p>
                    <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Apellidos" id="apellidos" name="apellidos"></p>
                    <p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="Email" id="email" name="email" required></p>
                    <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Contraseña" id="password" name="password" required></p>
                    <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Empresa" id="empresa" name="empresa"></p>
                    <div>
                        <p><button class="w3-button" id="btRegister">Registrarse</button></p>
                    </div>
                </form>
                <p id="pnlMensaje" name="pnlMensaje"></p>
            </div>
        </div>
    </div>

    <!--pie de pagina-->
    <footer class="w3-center w3-black w3-padding-16">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p class="w3-medium"><b>DEV</b>SITE</p>
    </footer>

    <script src="js/registro.js"></script>
</body>

</html>