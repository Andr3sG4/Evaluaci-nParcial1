<?php
require_once('../Models/cls_clientes.model.php');
$clientes = new Clase_Clientes;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $clientes->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $ID_cliente = $_POST["ID_cliente"];
        $datos = array();
        $datos = $clientes->uno($ID_cliente);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];

        $datos = array();
        $datos = $clientes->insertar($Nombre, $Direccion, $Telefono,);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $ID_cliente = $_POST["ID_cliente"];
        $Nombre = $_POST["Nombre"];
        $Direccion = $_POST["Direccion"]; 
        $Telefono = $_POST["Telefono"];

        $datos = array();
        $datos = $clientes->actualizar($ID_cliente, $Nombre, $Direccion, $Telefono);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $ID_cliente = $_POST["ID_cliente"];
        $datos = array();
        $datos = $clientes->eliminar($ID_cliente);
        echo json_encode($datos);
        break;
    case "nombre_repetido":
        $Nombre = $_POST["Nombre"];
        $datos = array();
        $datos = $clientes->nombre_repetido($Nombre);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;

}
