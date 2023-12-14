<?php
require_once('cls_conexion.model.php');
class Clase_Automoviles
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `automoviles`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($Id_Automoviles)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `automoviles` WHERE Id_Automoviles=$Id_Automoviles";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Marca, $Modelo, $Año, $Color, $Transmisión, $Tipo_Combustible, $Num_Puertas, $Precio)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `automoviles`(`Marca`, `Modelo`, `Año`, `Color`, `Transmisión`, `Tipo_Combustible`, `Num_Puertas`, `Precio`) VALUES ('$Marca','$Modelo','$Año','$Color','$Transmisión','$Tipo_Combustible','$Num_Puertas','$Precio')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($Id_Automoviles, $Marca, $Modelo, $Año, $Color, $Transmisión, $Tipo_Combustible, $Num_Puertas, $Precio)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `automoviles` SET `Marca`='$Marca',`Modelo`='$Modelo',`Año`='$Año',`Color`='$Color',`Transmisión`='$Transmisión',`Tipo_Combustible`='$Tipo_Combustible',`Num_Puertas`='$Num_Puertas',`Precio`='$Precio' WHERE `Id_Automoviles`= $Id_Automoviles";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($Id_Automoviles)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from automoviles where Id_Automoviles=$Id_Automoviles";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
