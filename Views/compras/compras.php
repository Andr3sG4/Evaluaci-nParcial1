<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Compras</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_compras">Nueva Compra</button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID Cliente</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">ID Producto</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Total</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_compras">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="Modal_compras" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_compras">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nueva Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="Id_compra" id="Id_compra">

                    <div class="form-group">
                        <label for="ID_cliente">ID Cliente</label>
                        <input type="text" required class="form-control" id="ID_cliente" name="ID_cliente" placeholder="ID Cliente">
                    </div>
                    <div class="form-group">
                        <label for="ID_producto">ID Producto</label>
                        <input type="text" required class="form-control" id="ID_producto" name="ID_producto" placeholder="ID Producto">
                    </div>
                    <div class="form-group">
                        <label for="Cantidad">Cantidad</label>
                        <input type="text" required class="form-control" id="Cantidad" name="Cantidad" placeholder="Cantidad">
                    </div>
                    <div class="form-group">
                        <label for="Total">Total</label>
                        <input type="text" required class="form-control" id="Total" name="Total" placeholder="Total">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Compra</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="compras.controller.js"></script>
<script src="compras.model.js"></script>