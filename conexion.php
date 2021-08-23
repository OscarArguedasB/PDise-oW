<?php
Class Connect{
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

    public function __construct() {
        $this->elServidor = "localhost";
        $this->elUsuario ="root";
        $this->elPassword = "";
        $this->laBD = "proyecto";
    }

    public function __construct1($elServidor, $elUsuario, $elPassword) {
        $this->elServidor = $elServidor;
        $this->elUsuario = $elUsuario;
        $this->elPassword = $elPassword;
    }

    public function __construct3($elServidor, $elUsuario, $elPassword, $laBD) {
        $this->elServidor = $elServidor;
        $this->elUsuario = $elUsuario;
        $this->elPassword = $elPassword;
        $this->laBD = $laBD;
    }
    
    function Conecta(){	
        $laconexion = new mysqli($this->elServidor, $this->elUsuario, $this->elPassword, $this->laBD);
        
        if ($laconexion->connect_error) {
            die("Error al Conectar con la BD: " . $laconexion->connect_error);
        } 
        //echo "Conexion exitosa <br>";
        
        return $laconexion;			
    }
function disconnectBD($conexion){
    $close = mysqli_close($conexion);
    if($close){
        echo 'Se ha hecho la desconexion de la base de datos exitosamente';
    } else {
        echo 'No se ha hecho la desconexion con la base de datos.';
    }
    return $close;
}

function ConsultaSQL($elQuery){			
    $conexion = $this->Conecta();			
    $queryDevuelto = $conexion->query($elQuery);
    return $queryDevuelto;			  
}

function devuelveUnDato($miQuery){
    while($row = $miQuery->fetch_assoc()) {
        $resultado= $row["nombre"];
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
                        echo "<tr>";
                        echo "<th scope='row'>" . "<img src=" . $row["imagen"] . 'style="width:90px"class="w3-hover-opacity">' . "</td> ";
                        echo "<td>" . $row["nombre"] .      "</td> ";
                        echo "<td>" . $row["descripcion"] .      "</td> ";
                        echo "<td>" . "<a href=" .  $row["proyecto"] .
                            "'>Descargar</a>" . "</td>";
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

}