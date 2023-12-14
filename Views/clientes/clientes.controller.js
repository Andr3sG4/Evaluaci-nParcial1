function init() {
    $("#form_clientes").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    
    todos_controlador();
});

var todos_controlador = () => {
    var todos = new Clientes_Model("", "", "", "", "todos");
    todos.todos();
};

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#form_clientes")[0]);
    var ID_cliente = document.getElementById("ID_cliente").value;
    if (ID_cliente > 0) {
        var clientes = new Clientes_Model("", "", "", formData, "editar");
        clientes.editar();
    } else {
        var clientes = new Clientes_Model("", "", "", formData, "insertar");
        clientes.insertar();
    }
};

var editar = (ID_cliente) => {
    var uno = new Clientes_Model(ID_cliente, "", "", "", "uno");
    uno.uno();
};

var nombre_repetido = () => {
    var Nombre = $("#Nombre").val();
    var clientes = new Clientes_Model("", Nombre, "", "", "nombre_repetido");
    clientes.nombre_repetido();
};


var eliminar = (ID_cliente) => {
    var eliminar = new Clientes_Model(ID_cliente, "", "", "", "eliminar");
    eliminar.eliminar();
}


init();
