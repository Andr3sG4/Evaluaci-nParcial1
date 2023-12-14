<?php
require_once('../Models/cls_automoviles.model.php');
$automoviles = new Clase_Automoviles;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $automoviles->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $Id_Automoviles = $_POST["Id_Automoviles"];
        $datos = array();
        $datos = $automoviles->uno($Id_Automoviles);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
        
    case 'insertar':

        $Marca = $_POST["Marca"];
        $Modelo = $_POST["Modelo"];
        $Año = $_POST["Año"];
        $Color = $_POST["Color"];
        $Transmisión = $_POST["Transmisión"];
        $Tipo_Combustible = $_POST["Tipo_Combustible"];
        $Num_Puertas = $_POST["Num_Puertas"];
        $Precio = $_POST["Precio"];

        $datos = array();
        $datos = $automoviles->insertar($Marca, $Modelo, $Año, $Color, $Transmisión, $Tipo_Combustible, $Num_Puertas, $Precio);
        echo json_encode($datos);
        break;

    case 'actualizar':

        $Id_Automoviles = $_POST["Id_Automoviles"];
        $Marca = $_POST["Marca"]; 
        $Modelo = $_POST["Modelo"];
        $Año = $_POST["Año"];
        $Color = $_POST["Color"];
        $Transmisión = $_POST["Transmisión"];
        $Tipo_Combustible = $_POST["Tipo_Combustible"];
        $Num_Puertas = $_POST["Num_Puertas"];
        $Precio = $_POST["Precio"];

        $datos = array();
        $datos = $automoviles->actualizar($Id_Automoviles, $Marca, $Modelo, $Año, $Color, $Transmisión, $Tipo_Combustible, $Num_Puertas, $Precio);
        echo json_encode($datos);
        break;
        

    case 'eliminar':
        $Id_Automoviles = $_POST["Id_Automoviles"];
        $datos = array();
        $datos = $automoviles->eliminar($Id_Automoviles);
        echo json_encode($uno);
        break;
}
