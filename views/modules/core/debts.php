<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Deudas</h3>
        </div>
    </div>


    <!-- CONTENT AREA -->

    <div class="row">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow">
                <button type="button" class="btn btn-outline-success btn-sm mb-2 mr-2" data-toggle="modal" data-target=".modal-add-debt">Agregar deuda</button><hr>
                <div class="widget-content widget-content-area">
                    <table id="tableDebts" class="table style-3 tableDebts table-hover table-bordered table-striped dt-responsive" width="100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column text-center"> Id </th>
                                <th>Código</th>
                                <th>Fecha</th>
                                <th>Categoría</th>
                                <th>Tercero</th>                                
                                <th>Valor</th>
                                <th>Descripción</th>
                                <th>Cuotas</th>
                                <th>Proceso</th>
                                <th>Fecha final</th>
                                <th>Estado</th>
                                <th class="text-center dt-no-sorting">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
</div>

<div class="modal fade modal-add-debt" tabindex="-1" role="dialog" aria-labelledby="add-debt" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate method="post">

                <div class="modal-header">
                    <h5 class="modal-title" id="add-debt">Agregar deuda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="addDate">Fecha</label>
                            <input type="date" class="form-control" id="addDate" name="addDate" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                        <div class="col-md-8 mb-4">
                            <label for="addCategory">Categoría</label>
                            <select name="addCategory" class="form-control selectpicker" data-live-search="true" id="addCategory" name="addCategory" required>
                                <option value="">Seleccionar categoría</option>
                                <?php 

                                    $table = "categories";
                                    $item = "";
                                    $value = "";
                                    $item_ = "bdelete";
                                    $value_ = 0;

                                    $response = ControllerUsers::ctrViewData($table, $item, $value, $item_, $value_);

                                    foreach ($response as $key => $value) {

                                        echo '<option value="'.$value["icategory"].'">'.$value["name"].'</option>';

                                    }

                                ?>
                            </select>
                            
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-row">

                        <div class="col-md-6 mb-4">
                            <label for="addPerson">Persona</label>
                            <select name="addPerson" class="form-control selectpicker" data-live-search="true" id="addPerson" name="addPerson" required>
                                <option value="">Seleccionar tercero</option>
                                <?php 

                                    $table = "persons";
                                    $item = "";
                                    $value = "";
                                    $item_ = "bdelete";
                                    $value_ = 0;

                                    $response = ControllerUsers::ctrViewData($table, $item, $value, $item_, $value_);

                                    foreach ($response as $key => $value) {

                                        echo '<option value="'.$value["iperson"].'">'.$value["name"].'</option>';

                                    }

                                ?>
                            </select>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-2 mb-4">
                            <label for="addQuota">Cuotas</label>
                            <input type="number" class="form-control" id="addQuota" name="addQuota" placeholder="Coutas" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <label for="addValue">Valor</label>
                            <input type="number" class="form-control" id="addValue" name="addValue" placeholder="Valor" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-12 mb-12">
                            <label for="addDescription">Descripción</label>
                            <textarea cols="30" rows="4" class="form-control" id="addDescription" name="addDescription" placeholder="Descripción" required></textarea>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <?php 

                            $createDebt = new ControllerDebts();
                            $createDebt -> ctrCreateDebt();

                        ?>

                    </div>
                                        
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-default mt-2" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button class="btn btn-outline-primary mt-2" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade modal-edit-debt" tabindex="-1" role="dialog" aria-labelledby="edit-debt" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate method="post">

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-debt">Editar deuda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-3 mb-4">
                            <label for="editCode">Código</label>
                            <input type="text" class="form-control" id="editCode" name="editCode" readonly required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <label for="editDate">Fecha</label>
                            <input type="date" class="form-control" id="editDate" name="editDate" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="editCategory">Categoría</label>
                            <select name="editCategory" class="form-control" data-live-search="true" id="editCategory" name="editCategory" required>
                                <option class="editCategoryOption"></option>
                                <?php 

                                    $table = "categories";
                                    $item = "";
                                    $value = "";
                                    $item_ = "bdelete";
                                    $value_ = 0;

                                    $response = ControllerUsers::ctrViewData($table, $item, $value, $item_, $value_);

                                    foreach ($response as $key => $value) {

                                        echo '<option value="'.$value["icategory"].'">'.$value["name"].'</option>';

                                    }

                                ?>
                            </select>
                            
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-row">

                        <div class="col-md-6 mb-4">
                            <label for="editPerson">Persona</label>
                            <select name="editPerson" class="form-control" data-live-search="true" id="editPerson" name="editPerson" required>
                                <option class="editPersonOption"></option>
                                <?php 

                                    $table = "persons";
                                    $item = "";
                                    $value = "";
                                    $item_ = "bdelete";
                                    $value_ = 0;

                                    $response = ControllerUsers::ctrViewData($table, $item, $value, $item_, $value_);

                                    foreach ($response as $key => $value) {

                                        echo '<option value="'.$value["iperson"].'">'.$value["name"].'</option>';

                                    }

                                ?>
                            </select>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-2 mb-4">
                            <label for="editQuota">Cuotas</label>
                            <input type="number" class="form-control" id="editQuota" name="editQuota" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <label for="editValue">Valor</label>
                            <input type="number" class="form-control" id="editValue" name="editValue" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-12 mb-12">
                            <label for="editDescription">Descripción</label>
                            <textarea cols="30" rows="4" class="form-control" id="editDescription" name="editDescription" required></textarea>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <?php 

                            $editDebt = new ControllerDebts();
                            $editDebt -> ctrEditDebt();

                        ?>

                    </div>
                                        
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-default mt-2" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button class="btn btn-outline-primary mt-2" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>