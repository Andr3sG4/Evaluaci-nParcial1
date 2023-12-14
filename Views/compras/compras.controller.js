function init() {
    $("#form_compras").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    todos_controlador();
});

var todos_controlador = () => {
    var todos = new Compras_Model("", "", "", "", "todos");
    todos.todos();
}

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#form_compras")[0]);
    var Id_compra = document.getElementById("Id_compra").value;

    if (Id_compra > 0) {
        var compras = new Compras_Model("", "", "", "", "editar");
        compras.editar();
    } else {
        var compras = new Compras_Model("", "", "", "", "insertar");
        compras.insertar();
    }
}
var editar = (Id_compra) => {
    var uno = new Compras_Model(Id_compra, "", "", "", "uno");
    uno.uno();
}

var eliminar = (Id_compra) => {
    var eliminar = new Compras_Model(Id_compra, "", "", "", "eliminar");
    eliminar.eliminar();
}

init();