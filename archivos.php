<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Subir Archivos con AJAX</title>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
</head>

<body>

    <?php
    $email =   $_REQUEST['email'];
    ?>

    <div class="principal">
        <h1>Suba su proyecto</h1>


        <form method="POST" id="form_subir" action="subir.php">

            <div class="form-1-2">
                <label for="">Proyecto a subir:</label>
                <input type="file" name="archivo" required id="archivo">
            </div>


            <div>
                <label for="">Imagen a subir:</label>
                <input type="file" name="imagen" required id="imagen">
            </div>
            <div>
                <p><input type="email" placeholder="Email" id="email" name="email" style="display:none" value="<?php echo $email ?>" required></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre" id="nombre" name="nombre" required></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Descripcion" id="descripcion" name="descripcion" required></p>
            </div>
            <div class="acciones">
                <button id="subir" name="subir" type="submit" class="btn btn-primary btn-lg btn-block info">Guardar</button>
            </div>

        </form>

    </div>

    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>