<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Automóviles</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_automoviles_automoviles"> Nuevo Vehiculo </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Marca</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Modelo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Año</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Color</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Transmisión</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tipo de Combustible</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Número de Puertas</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Precio</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_automoviles_automoviles">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Modal_automoviles_automoviles" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_automoviles_automoviles">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Vehiculos Disponibles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="Id_Automoviles" id="Id_Automoviles">

                    <div class="form-group">
                        <label for="Marca">Marca</label>
                        <input type="text" required class="form-control" id="Marca" name="Marca" placeholder="Marca">
                    </div>
                    <div class="form-group">
                        <label for="Modelo">Modelo</label>
                        <input type="text" required class="form-control" id="Modelo" name="Modelo" placeholder="Modelo">
                    </div>
                    <div class="form-group">
                        <label for="Año">Año</label>
                        <input type="text" required class="form-control" id="Año" name="Año" placeholder="Año">
                    </div>
                    <div class="form-group">
                        <label for="Color">Color</label>
                        <input type="text" required class="form-control" id="Color" name="Color" placeholder="Color">
                    </div>
                    <div class="form-group">
                        <label for="Transmisión">Transmisión</label>
                        <input type="text" required class="form-control" id="Transmisión" name="Transmisión" placeholder="Transmisión">
                    </div>
                    <div class="form-group">
                        <label for="Tipo_Combustible">Tipo de Combustible</label>
                        <input type="text" required class="form-control" id="Tipo_Combustible" name="Tipo_Combustible" placeholder="Tipo de Combustible">
                    </div>
                    <div class="form-group">
                        <label for="Num_Puertas">Número de Puertas</label>
                        <input type="text" required class="form-control" id="Num_Puertas" name="Num_Puertas" placeholder="Número de Puertas">
                    </div>
                    <div class="form-group">
                        <label for="Precio">Precio</label>
                        <input type="text" required class="form-control" id="Precio" name="Precio" placeholder="Precio">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="automoviles.controller.js"></script>
<script src="automoviles.model.js"></script>
