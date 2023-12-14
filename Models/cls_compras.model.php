<?php
require_once('cls_conexion.model.php');

class Clase_Compras
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `compras`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            if (isset($con)) {
                $con->close();
            }
        }
    }

    public function uno($Id_compra)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `compras` WHERE Id_compra=$Id_compra";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            if (isset($con)) {
                $con->close();
            }
        }
    }

    public function insertar($ID_cliente, $ID_producto, $Cantidad, $Total)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `compras`(`ID_cliente`, `ID_producto`, `Cantidad`, `Total`) VALUES ($ID_cliente, $ID_producto, $Cantidad, $Total)";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            if (isset($con)) {
                $con->close();
            }
        }
    }

    public function actualizar($Id_compra, $ID_cliente, $ID_producto, $Cantidad, $Total)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `compras` SET `ID_cliente`='$ID_cliente', `ID_producto`='$ID_producto', `Cantidad`='$Cantidad', `Total`='$Total' WHERE `Id_compra`= $Id_compra";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            if (isset($con)) {
                $con->close();
            }
        }
    } 

    public function eliminar($Id_compra)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM compras WHERE Id_compra=$Id_compra";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            if (isset($con)) {
                $con->close();
            }
        }
    }
}
?>