<?php
require_once('../Models/cls_compras.model.php');

$compras = new Clase_Compras;

switch ($_GET["op"]) {
    case 'todos':
        $datos = $compras->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $Id_compra = $_POST["Id_compra"];
        $datos = $compras->uno($Id_compra);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;

    case 'insertar':
        $ID_cliente = $_POST["ID_cliente"];
        $ID_producto = $_POST["ID_producto"];
        $Cantidad = $_POST["Cantidad"];
        $Total = $_POST["Total"];

        $resultado = $compras->insertar($ID_cliente, $ID_producto, $Cantidad, $Total);
        echo json_encode($resultado);
        break;

    case 'actualizar':
        $Id_compra = $_POST["Id_compra"];
        $ID_cliente = $_POST["ID_cliente"];
        $ID_producto = $_POST["ID_producto"];
        $Cantidad = $_POST["Cantidad"];
        $Total = $_POST["Total"];

        $resultado = $compras->actualizar($Id_compra, $ID_cliente, $ID_producto, $Cantidad, $Total);
        echo json_encode($resultado);
        break;

    case 'eliminar':
        $Id_compra = $_POST["Id_compra"];
        $resultado = $compras->eliminar($Id_compra);
        echo json_encode($resultado);
        break;
}
