<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Usuarios</h3>
        </div>
    </div>


    <!-- CONTENT AREA -->

    <div class="row">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow">
                <button type="button" class="btn btn-outline-success btn-sm mb-2 mr-2" data-toggle="modal" data-target=".modal-add-user">Agregar usuario</button><hr>
                <div class="widget-content widget-content-area">

                    <table id="tableUsers" class="table style-3 tableUsers table-hover table-bordered table-striped dt-responsive" width="100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column text-center"> Id </th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Perfil</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center dt-no-sorting">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
    <!-- CONTENT AREA -->

</div>

<div class="modal fade modal-add-user" tabindex="-1" role="dialog" aria-labelledby="add-user" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate method="post">

                <div class="modal-header">
                    <h5 class="modal-title" id="add-user">Agregar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="addName">Nombre</label>
                            <input type="text" class="form-control" id="addName" name="addName" placeholder="Nombre" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-4">
                            <label for="addUser">Usuario</label>
                            <input type="text" class="form-control" id="addUser" name="addUser" placeholder="Usuario" required>
                            
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <label for="addPassword">Contraseña</label>
                            <input type="password" class="form-control" id="addPassword" name="addPassword" placeholder="Usuario" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <label for="addProfile">Perfil</label>
                            <select class="form-control selectpicker" data-live-search="true" id="addProfile" name="addProfile" required>
                                <option value="">Seleccionar perfil</option>
                                <option value="1">Administrador</option>
                                <option value="2">Especial</option>
                            </select>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                        <?php 

                            $createUser = new ControllerUsers();
                            $createUser -> ctrCreateUser();
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

<div class="modal fade modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="edit-user" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate method="post">

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-user">Editar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-3 mb-12">
                            <label for="editCode">Código</label>
                            <input type="text" class="form-control" id="editCode" name="editCode" readonly required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                        <div class="col-md-9 mb-12">
                            <label for="editName">Nombre</label>
                            <input type="text" class="form-control" id="editName" name="editName" required>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-4">
                            <label for="editUser">Usuario</label>
                            <input type="text" class="form-control" id="editUser" name="editUser" required>
                            
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <label for="editPassword">Contraseña</label>
                            <input type="password" class="form-control" id="editPassword" name="editPassword">
                            <input type="hidden" name="existingPassword">   
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <label for="editProfile">Perfil</label>
                            <select class="form-control" data-live-search="true" id="editProfile" name="editProfile" required>
                                <option class="editProfileOption"></option>
                                <option value="1">Administrador</option>
                                <option value="2">Especial</option>
                            </select>
                            <div class="valid-feedback">
                                ¡Validado correctamente!
                            </div>
                            <div class="invalid-feedback">
                                Error en la validación.
                            </div>
                        </div>
                    </div>
                    <?php 

                        $editUser = new ControllerUsers();
                        $editUser -> ctrEditUser();
                    ?>                  
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-default mt-2" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                    <button class="btn btn-outline-primary mt-2" type="submit">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>