
class Automoviles_Automoviles_Model {
    constructor(
        Id_Automoviles,
        Marca,
        Modelo,
        Año,
        Color,
        Transmisión,
        Tipo_Combustible,
        Num_Puertas,
        Precio,
        Ruta
    ) {
        this.Id_Automoviles = Id_Automoviles;
        this.Marca = Marca;
        this.Modelo = Modelo;
        this.Año = Año;
        this.Color = Color;
        this.Transmisión = Transmisión;
        this.Tipo_Combustible = Tipo_Combustible;
        this.Num_Puertas = Num_Puertas;
        this.Precio = Precio;
        this.Ruta = Ruta;
    }
    todos() {
        var html = "";
        $.get("../../Controllers/automoviles.controller.php?op=" + this.Ruta, (res) => {
            res = JSON.parse(res);
            $.each(res, (index, valor) => {
                html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Marca}</td>
                <td>${valor.Modelo}</td>
                <td>${valor.Año}</td>
                <td>${valor.Color}</td>
                <td>${valor.Transmisión}</td>
                <td>${valor.Tipo_Combustible}</td>
                <td>${valor.Num_Puertas}</td>
                <td>${valor.Precio}</td>
              <td>
              <button class='btn btn-success' onclick='editar(${valor.Id_Automoviles
                    })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${valor.Id_Automoviles
                    })'>Eliminar</button>
              <button class='btn btn-info' onclick='ver(${valor.Id_Automoviles
                    })'>Ver</button>
              </td></tr>
                  `;
            });
            $("#tabla_automoviles_automoviles").html(html);
        });
    }

    insertar() {
        var dato = new FormData();
        dato = this.Precio;
        $.ajax({
            url: "../../Controllers/automoviles.controller.php?op=insertar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Automoviles", "Automóvil Registrado Exitosamente", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            }
        });


        this.limpia_Cajas();
    }

    uno() {
        var Id_Automoviles = this.Id_Automoviles;
        $.post(
            "../../Controllers/automoviles.controller.php?op=uno",
            { Id_Automoviles: Id_Automoviles },
            (res) => {
                res = JSON.parse(res);
                $("#Id_Automoviles").val(res.Id_Automoviles);
                $("#Marca").val(res.Marca);
                $("#Modelo").val(res.Modelo);
                $("#Año").val(res.Año);
                $("#Color").val(res.Color);       
                document.getElementById("Transmisión").value = res.Transmisión;
                document.getElementById("Tipo_Combustible").value = res.Tipo_Combustible;
                document.getElementById("Num_Puertas").value = res.Num_Puertas;
                document.getElementById("Precio").value = res.Precio;
            }
        );
        $("#Modal_automoviles_automoviles").modal("show");
    }

    editar() {
        var dato = new FormData();
        dato = this.Precio;
        $.ajax({
            url: "../../Controllers/automoviles.controller.php?op=actualizar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Automoviles", "Automovil Actualizado Exitosamente", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            }
        });

        this.limpia_Cajas();
    }

    eliminar() {
        var Id_Automoviles = this.Id_Automoviles;

        Swal.fire({
            title: "Automoviles",
            text: "Esta seguro de eliminar el vehiculo",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Eliminar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    "../../Controllers/automoviles.controller.php?op=eliminar",
                    { Id_Automoviles: Id_Automoviles },
                    (res) => {
                        res = JSON.parse(res);
                        if (res === "ok") {
                            Swal.fire("Automoviles", "Vehiculo Eliminado Exitosamente", "success");
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
        document.getElementById("Marca").value = "";
        document.getElementById("Modelo").value = "";
        document.getElementById("Año").value = "";
        document.getElementById("Color").value = "";
        document.getElementById("Transmisión").value = "";
        document.getElementById("Tipo_Combustible").value = "";
        document.getElementById("Num_Puertas").value = "";
        document.getElementById("Precio").value = "";
        $("#Id_Automoviles").val("");
        $("#Modal_automoviles_automoviles").modal("hide");
    }
}
