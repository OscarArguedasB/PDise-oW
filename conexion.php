<?php
class Connect
{
    private $elServidor;
    private $elUsuario;
    private $elPassword;
    private $laBD;

    /**
     * Get the value of elServidor
     */
    public function getElServidor()
    {
        return $this->elServidor;
    }

    /**
     * Set the value of elServidor
     *
     * @return  self
     */
    public function setElServidor($elServidor)
    {
        $this->elServidor = $elServidor;

        return $this;
    }

    /**
     * Get the value of elUsuario
     */
    public function getElUsuario()
    {
        return $this->elUsuario;
    }

    /**
     * Set the value of elUsuario
     *
     * @return  self
     */
    public function setElUsuario($elUsuario)
    {
        $this->elUsuario = $elUsuario;

        return $this;
    }

    /**
     * Get the value of elPassword
     */
    public function getElPassword()
    {
        return $this->elPassword;
    }

    /**
     * Set the value of elPassword
     *
     * @return  self
     */
    public function setElPassword($elPassword)
    {
        $this->elPassword = $elPassword;

        return $this;
    }

    /**
     * Get the value of laBD
     */
    public function getLaBD()
    {
        return $this->laBD;
    }

    /**
     * Set the value of laBD
     *
     * @return  self
     */
    public function setLaBD($laBD)
    {
        $this->laBD = $laBD;

        return $this;
    }

    public function __construct()
    {
        $this->elServidor = "localhost";
        $this->elUsuario = "root";
        $this->elPassword = "";
        $this->laBD = "proyecto";
    }

    public function __construct1($elServidor, $elUsuario, $elPassword)
    {
        $this->elServidor = $elServidor;
        $this->elUsuario = $elUsuario;
        $this->elPassword = $elPassword;
    }

    public function __construct3($elServidor, $elUsuario, $elPassword, $laBD)
    {
        $this->elServidor = $elServidor;
        $this->elUsuario = $elUsuario;
        $this->elPassword = $elPassword;
        $this->laBD = $laBD;
    }

    function Conecta()
    {
        $laconexion = new mysqli($this->elServidor, $this->elUsuario, $this->elPassword, $this->laBD);

        if ($laconexion->connect_error) {
            die("Error al Conectar con la BD: " . $laconexion->connect_error);
        }
        //echo "Conexion exitosa <br>";

        return $laconexion;
    }
    function disconnectBD($conexion)
    {
        $close = mysqli_close($conexion);
        if ($close) {
            echo 'Se ha hecho la desconexion de la base de datos exitosamente';
        } else {
            echo 'No se ha hecho la desconexion con la base de datos.';
        }
        return $close;
    }

    function ConsultaSQL($elQuery)
    {
        $conexion = $this->Conecta();
        $queryDevuelto = $conexion->query($elQuery);
        return $queryDevuelto;
    }

    function devuelveUnDato($miQuery)
    {
        while ($row = $miQuery->fetch_assoc()) {
            $resultado = $row["nombre"];
        }
        return $resultado;
    }
    function devuelveAcercaDe($miQuery)
    {
        while ($row = $miQuery->fetch_assoc()) {
            $resultado = $row["acercaDe"];
        }
        return $resultado;
    }

    function imprimeTabla($miQuery)
    {
        echo "<table>";
        echo "<tr>";
        echo " <th scope='col'> Imagen  </th>";
        echo " <th scope='col'> Nombre</th>";
        echo " <th scope='col'> Descripcion  </th>";
        echo " <th scope='col'> Descarga </th>";
        echo "</tr>";
        if ($miQuery->num_rows > 0) {
            while ($row = $miQuery->fetch_assoc()) {
                if ($row["imagen"] == '') {
                    $imagen = "proyecto/blueprint.png";
                } else {
                    $imagen = $row["imagen"];
                }
                echo "<tr>";
                echo "<th scope='row'>" . "<img src=" . $imagen . " " . 'style="width:90px" class="w3-hover-opacity">' . "</td> ";
                echo "<td>" . $row["nombre"] .      "</td> ";
                echo "<td>" . $row["descripcion"] .      "</td> ";
                echo "<td>" . "<a href=archivos/" .  $row["proyecto"] .
                    " download=". $row["proyecto"] .">Descargar</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <th> El usuario no tiene proyectos </th>";
            echo "</tr>";
            //    echo "0 Filas";
        }
        echo "</table>";
    }

    function imprimeProyecto($miQuery){
        echo "<table>";
        echo "<tr>";
        echo " <th scope='col'> Imagen  </th>";
        echo " <th scope='col'> Nombre</th>";
        echo " <th scope='col'> Descripcion  </th>";
        echo " <th scope='col'> Perfil </th>";
        echo "</tr>";
        if ($miQuery->num_rows > 0) {
            while ($row = $miQuery->fetch_assoc()) {
                if ($row["imagen"] == '') {
                    $imagen = "proyecto/blueprint.png";
                } else {
                    $imagen = $row["imagen"];
                }
                echo "<tr>";
                echo "<th scope='row'>" . "<img src=" . $imagen . " " . 'style="width:90px" class="w3-hover-opacity">' . "</td> ";
                echo "<td>" . $row["nombre"] .      "</td> ";
                echo "<td>" . $row["descripcion"] .      "</td> ";
                echo "<td>" . "<a href=" . "proyectosUsuario.php?email=".  $row["usuario_email"] .
                    ">Ver</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <th> El usuario no tiene proyectos </th>";
            echo "</tr>";
            //    echo "0 Filas";
        }
        echo "</table>";
    }

    function printMSJ($miQuery)
    {
        echo "<table>";
        echo "<tr>";
        echo " <th scope='col'> Para:   </th>";
        echo " <th scope='col'> De: </th>";
        echo " <th scope='col'> Email de contacto  </th>";
        echo " <th scope='col'> Mensaje </th>";
        echo "</tr>";
        if ($miQuery->num_rows > 0) {
            while ($row = $miQuery->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["usuario_email"] .      "</td> ";
                echo "<td>" . $row["de"] .      "</td> ";
                echo "<td>" . $row["emailDe"] .      "</td> ";
                echo "<td>" . $row["msj"] .      "</td> ";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <th> No tiene mensajes </th>";
            echo "</tr>";
            //    echo "0 Filas";
        }
        echo "</table>";
    }

    function imprimeTelefonos($miQuery)
    {
        if ($miQuery->num_rows > 0) {
            while ($row = $miQuery->fetch_assoc()) {
                echo "<p>" . $row["telefono"] . "</p";
            }
        } else {
            echo " <p> El usuario no tiene telefonos </p>";
            //    echo "0 Filas";
        }
    }

    function registro($ptipo, $pnombre, $papellidos, $pemail, $ppassword, $pempresa)
    {
        $response = "";
        $conexion = $this->Conecta();
        $stmt = $conexion->prepare("INSERT INTO usuario (email,password,tipo, nombre, apellidos,empresa) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssisss", $email, $password, $tipo, $nombre, $apellidos, $empresa);

        $email = $pemail;
        $password = $ppassword;
        $tipo = $ptipo;
        $nombre = $pnombre;
        $apellidos = $papellidos;
        $empresa = $pempresa;

        $stmt->execute();
        $response = "Registro exitoso";
        return $response;
        $stmt->close();
        $conexion->close();
    }

    
    function proyectos($parchivo, $pdescripcion, $pemail, $pnombre1,$pnombre)
    {
        $response = "";
        $conexion = $this->Conecta();
        $stmt = $conexion->prepare("INSERT INTO proyecto (nombre,descripcion,usuario_email, imagen, proyecto) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $archivo, $descripcion, $email, $nombre1,$nombre);

        $archivo = $parchivo;
        $descripcion = $pdescripcion;
        $email = $pemail;
        $nombre1 = $pnombre1;
        $nombre = $pnombre;

        $stmt->execute();
        $response = "Archivo agregado";
        return $response;
        $stmt->close();
        $conexion->close();
    }
    
    function UpdUser($pnombre, $papellidos, $pemail, $pemailN, $ppasswordO, $ppasswordN, $pempresa, $pacercaDe)
    {
        $response = "";
        $conexion = $this->Conecta();
        $stmt = $conexion->prepare("UPDATE usuario set email=?,password=?,nombre=?, apellidos=?,empresa=?,acercaDe=? where password=? and email=?");
        $stmt->bind_param("ssssssss", $emailN, $passwordN, $nombre, $apellidos, $empresa, $acercaDe,$passwordO,$email);

        $email = $pemail;
        $emailN=$pemailN;
        $passwordO = $ppasswordO;
        $passwordN = $ppasswordN;
        $nombre = $pnombre;
        $apellidos = $papellidos;
        $empresa = $pempresa;
        $acercaDe = $pacercaDe;

        $stmt->execute();
        $response = "Update exitoso";
        return $response;
        $stmt->close();
        $conexion->close();
    }

    function mensaje($pemail, $pde, $pemailDe, $pmsj)
    {
        $response = "";
        $conexion = $this->Conecta();
        $stmt = $conexion->prepare("INSERT INTO mensajes (usuario_email,de,emailDe, msj) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $email, $de, $emailDe, $msj);

        $email=$pemail;
        $de=$pde;
        $emailDe=$pemailDe;
        $msj=$pmsj;

        $stmt->execute();
        $response = "Mensaje enviado";
        return $response;
        $stmt->close();
        $conexion->close();
    }
}
