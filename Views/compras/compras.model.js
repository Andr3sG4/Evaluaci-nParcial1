class Compras_Model {
    constructor(
        Id_compra,
        ID_cliente,
        ID_producto,
        Cantidad,
        Total,
        Ruta
    ) {
        this.Id_compra = Id_compra;
        this.ID_cliente = ID_cliente;
        this.ID_producto = ID_producto;
        this.Cantidad = Cantidad;
        this.Total = Total;
        this.Ruta = Ruta;
    }

    todos() {
        var html = "";
        $.get("../../Controllers/compras.controller.php?op=" + this.Ruta, (res) => {
            console.log(res);
            res = JSON.parse(res);
            $.each(res, (index, valor) => {
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${valor.ID_cliente}</td>
                    <td>${valor.ID_producto}</td>
                    <td>${valor.Cantidad}</td>
                    <td>${valor.Total}</td>
                    <td>
                        <button class='btn btn-success' onclick='editar(${valor.Id_compra})'>Editar</button>
                        <button class='btn btn-danger' onclick='eliminar(${valor.Id_compra})'>Eliminar</button>
                        <button class='btn btn-info' onclick='ver(${valor.Id_compra})'>Ver</button>
                    </td>
                </tr>`;
            });
            $("#tabla_compras").html(html);
        });
    }

    insertar() {
        var dato = new FormData();
        dato.append("ID_cliente", this.ID_cliente);
        dato.append("ID_producto", this.ID_producto);
        dato.append("Cantidad", this.Cantidad);
        dato.append("Total", this.Total);

        $.ajax({
            url: "../../Controllers/compras.controller.php?op=insertar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Compras", "Compra Registrada Exitosamente", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            },
        });
        this.limpia_Cajas();
    }

    uno() {
        var Id_compra = this.Id_compra;
        $.post(
            "../../Controllers/compras.controller.php?op=uno",
            { Id_compra: Id_compra },
            (res) => {
                res = JSON.parse(res);
                // Con JQuery
                $("#Id_compra").val(res.Id_compra);
                $("#ID_cliente").val(res.ID_cliente);
                $("#ID_producto").val(res.ID_producto);
                $("#Cantidad").val(res.Cantidad);
                $("#Total").val(res.Total);
            }
        );
        $("#Modal_compras").modal("show");
    }

    editar() {
        var dato = new FormData();
        dato.append("Id_compra", this.Id_compra);
        dato.append("ID_cliente", this.ID_cliente);
        dato.append("ID_producto", this.ID_producto);
        dato.append("Cantidad", this.Cantidad);
        dato.append("Total", this.Total);

        $.ajax({
            url: "../../Controllers/compras.controller.php?op=actualizar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Compras", "Compra Registrada Exitosamente", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            },
        });
        this.limpia_Cajas();
    }

    eliminar() {
        var Id_compra = this.Id_compra;

        Swal.fire({
            title: "Compras",
            text: "Esta seguro de eliminar esta compra",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Eliminar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    "../../Controllers/compras.controller.php?op=eliminar",
                    { Id_compra: Id_compra },
                    (res) => {
                        res = JSON.parse(res);
                        if (res === "ok") {
                            Swal.fire("Compras", "Compra Eliminada Correctamente", "success");
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
        $("#ID_cliente").val("");
        $("#ID_producto").val("");
        $("#Cantidad").val("");
        $("#Total").val("");
        $("#Id_compra").val("");
        $("#Modal_compras").modal("hide");
    }
}