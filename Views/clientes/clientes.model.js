class Clientes_Model {
    constructor(
        ID_cliente,
        Nombre,
        Direccion,
        Telefono,
        Ruta
    ) {
        this.ID_cliente = ID_cliente;
        this.Nombre = Nombre;
        this.Direccion = Direccion;
        this.Telefono = Telefono;
        this.Ruta = Ruta;
    } 
    todos() {
        var html = "";
        $.get("../../Controllers/clientes.controller.php?op=" + this.Ruta, (res) => {
            res = JSON.parse(res);
            $.each(res, (index, valor) => {

                html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.Nombre}</td>
                  <td>${valor.Direccion}</td>
                  <td>${valor.Telefono}</td>
                  
              <td>
              <button class='btn btn-success' onclick='editar(${valor.ID_cliente
                    })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${valor.ID_cliente
                    })'>Eliminar</button>
              <button class='btn btn-info' onclick='ver(${valor.ID_cliente
                    })'>Ver</button>
              </td></tr>
                  `;
            });
            $("#tabla_clientes").html(html);
        });
    }

    insertar() {
        var dato = new FormData();
        dato = this.Telefono;
        $.ajax({
            url: "../../Controllers/clientes.controller.php?op=insertar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Clientes", "Cliente Registrado", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            },
        });
        this.limpia_Cajas();
    }

    nombre_repetido() {
        var Nombre = this.Nombre;
        $.post(
            "../../Controllers/clientes.controller.php?op=nombre_repetido",
            { Nombre: Nombre },
            (res) => {
                res = JSON.parse(res);
                if (parseInt(res.nombre_repetido) > 0) {
                    $("#NombreRepetido").removeClass("d-none");
                    $("#NombreRepetido").html(
                        "El nombre ingresado, ya exite en la base de datos"
                    );
                    $("button").prop("disabled", true);
                } else {
                    $("#NombreRepetido").addClass("d-none");
                    $("button").prop("disabled", false);
                }
            }
        );
    }
  
    uno() {
        var ID_cliente = this.ID_cliente;
        $.post(
            "../../Controllers/clientes.controller.php?op=uno",
            { ID_cliente: ID_cliente },
            (res) => {
                res = JSON.parse(res);
               
                $("#ID_cliente").val(res.ID_cliente);
                $("#Nombre").val(res.Nombre);
                
                document.getElementById("Direccion").value = res.Direccion;
                document.getElementById("Telefono").value = res.Telefono;
            }
        );
        $("#Modal_cliente").modal("show");
    }

    editar() {
        var dato = new FormData();
        dato = this.Telefono;
        $.ajax({
            url: "../../Controllers/clientes.controller.php?op=actualizar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Clientes", "Cliente Registrado", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            },
        });
        this.limpia_Cajas();
    }

    eliminar() {
        var ID_cliente = this.ID_cliente;

        Swal.fire({
            title: "Clientes",
            text: "Esta seguro de eliminar al cliente",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Eliminar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    "../../Controllers/clientes.controller.php?op=eliminar",
                    { ID_cliente: ID_cliente },
                    (res) => {
                        res = JSON.parse(res);
                        if (res === "ok") {
                            Swal.fire("Clientes", "Cliente Eliminado", "success");
                            todos_controlador();
                        } else {
                            Swal.fire("Error", res, "error");
                        }
                    }
                );
            }
        });

        this.limpia_Cajas();
    }

    limpia_Cajas() {

        document.getElementById("Nombre").value = "";
        document.getElementById("Direccion").value = "";
        document.getElementById("Telefono").value = "";
        $("#ID_cliente").val("");

        $("#Modal_cliente").modal("hide");
    }
}
