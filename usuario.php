<!DOCTYPE html>
<html>

<head>
    <title>Perfil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="css/ICONO.JPG">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
</head>
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Raleway", sans-serif
    }
</style>

<body class="w3-light-grey w3-content" style="max-width:1600px">
    <?php

    include 'conexion.php';
    $email =   $_REQUEST['email'];
    $name = usuario($email);
    $acercaDe = acercaDe($email);


    function usuario($email)
    {
        $objetoConnect = new Connect();
        $sql = "SELECT concat(nombre,concat(' ',apellidos)) as nombre FROM usuario WHERE email='$email'";
        $miQuery = $objetoConnect->ConsultaSQL($sql);
        return $objetoConnect->devuelveUnDato($miQuery);
    }
    function acercaDe($email)
    {
        $objetoConnect = new Connect();
        $sql = "SELECT acercaDe FROM usuario WHERE email='$email'";
        $miQuery = $objetoConnect->ConsultaSQL($sql);
        return $objetoConnect->devuelveUnDato($miQuery);
    }

    ?>

    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="#home" class="w3-bar-item w3-button"><b>DEV</b>SITE</a>
            <div class="w3-right w3-hide-small">
                <a href="/usuario/ajustes.php" class="w3-bar-item w3-button">Ajustes</a>
            </div>
        </div>
    </div>

    <!-- Sidebar/menu -->
    <br>
    <br>
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <img src="profile/profile.png" style="width:45%;" class="w3-round"><br><br>
            <h4>
                <?php echo "<b>$name</b>" ?>
            </h4>
        </div>
        <div class="w3-bar-block">
            <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Projects</a>
            <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a>
            <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
        </div>
        <!-- <div class="w3-panel w3-large">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div> -->
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px">
        <br>
        <br>

        <!-- Header -->
        <header id="portfolio">
            <a href="#"><img src="profile/profile.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
            <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
            <div class="w3-container">
                <h1><b>Projects</b></h1>
            </div>
        </header>

        <!--Project-->
        <div class="w3-row-padding">
            <?php

            ImprimeDatos($email);

            function ImprimeDatos($email)
            {
                $objetoConnect = new Connect();
                $sql = "SELECT imagen,nombre, descripcion, proyecto FROM proyecto where usuario_email='$email'";
                $miQuery = $objetoConnect->ConsultaSQL($sql);
                echo '<div class="w3-container">';
                echo "<br>";
                $objetoConnect->imprimeTabla($miQuery);
                echo "</div>";
            }

            ?>
        </div>



        <!-- About me section -->
        <div class="w3-container w3-padding-large" style="margin-bottom:32px">
            <h4><b>About Me</b></h4>
            <?php echo "<p>$acercaDe</p>" ?>
            <hr>
        </div>

        <!-- Contact Section -->
        <div class="w3-container w3-padding-large w3-grey">
            <h4 id="contact"><b>Contact Me</b></h4>
            <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
                <div class="w3-third w3-dark-grey">
                    <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
                    <?php echo "<p>$email</p>" ?>
                </div>
                <div class="w3-third w3-dark-grey">
                    <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
                    <?php 
                    telefonos($email);

                    function telefonos($email)
                    {
                        $objetoConnect = new Connect();
                        $sql = "SELECT telefono FROM telefonos where usuario_email='$email'";
                        $miQuery = $objetoConnect->ConsultaSQL($sql);
                        $objetoConnect->imprimeTelefonos($miQuery);
                    }
                    ?>
                </div>
            </div>
            <hr class="w3-opacity">
            <form method="POST" id="msj">
                <!-- NOTA -->
                <div class="w3-section">
                    <label>To:</label>
                    <input class="w3-input w3-border" type="text" id="to" name="to" value="<?php echo $email ?>" readonly>
                </div>
                <div class="w3-section">
                    <label>Name</label>
                    <input class="w3-input w3-border" type="text" id="name" name="name" required>
                </div>
                <div class="w3-section">
                    <label>From (email)</label>
                    <input class="w3-input w3-border" type="text" id="from" name="from" required>
                </div>
                <div class="w3-section">
                    <label>Message</label>
                    <input class="w3-input w3-border" type="text" name="message" id="message"required>
                </div>
                <button id="btEnviar" type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
            </form>
        </div>

        <!-- Footer -->
        <footer class="w3-container w3-padding-32 w3-dark-grey">
            <div class="w3-row-padding">
                <div class="w3-third">
                    <h3>DEVSITE</h3>
                    <p>Queda prohibido copiar, reproducir, distribuir, publicar, transmitir, difundir, o en cualquier modo explotar cualquier parte de este servicio sin la autorización previa de su autor</p>
                    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
                </div>
                <div class="w3-third">
                    <p>Todos los contenidos de este Sitio (Incluyendo, pero no limitado a, texto, logotipos, contenido, fotografías, audio, botones, nombres comerciales y vídeo) están sujetos a derechos de propiedad por las leyes de Derechos de Autor y demás Leyes relativas Internacionales a DevSite y de terceros titulares de los mismos que han autorizado debidamente su inclusión.</p>
                </div>
            </div>
        </footer>

        <div class="w3-black w3-center w3-padding-24">DevSite®</div>

        <!-- End page content -->
    </div>

    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
    <script src="js/mensajeria.js"></script>
</body>

</html>