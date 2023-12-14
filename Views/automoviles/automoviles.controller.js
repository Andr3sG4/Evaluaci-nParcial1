function init() {
    $("#form_automoviles_automoviles").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    todos_controlador();
});

var todos_controlador = () => {
    var todos = new Automoviles_Automoviles_Model("", "", "", "", "", "", "", "", "", "todos");
    todos.todos();
}

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#form_automoviles_automoviles")[0]);
    var Id_Automoviles = document.getElementById("Id_Automoviles").value;

    if (Id_Automoviles > 0) {
        var automoviles = new Automoviles_Automoviles_Model("", "", "", "", "", "", "", "", formData, "editar");
        automoviles.editar();
    } else {
        var automoviles = new Automoviles_Automoviles_Model("", "", "", "", "", "", "", "", formData, "insertar");
        automoviles.insertar();
    }
}

var editar = (Id_Automoviles) => {
    var uno = new Automoviles_Automoviles_Model(Id_Automoviles, "", "", "", "", "", "", "", "", "uno");
    uno.uno()
}

var eliminar = (Id_Automoviles) => {
    var eliminar = new Automoviles_Automoviles_Model(Id_Automoviles, "", "", "", "", "", "", "", "", "eliminar");
    eliminar.eliminar();
}

    ; init();
