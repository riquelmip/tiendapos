<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $titulo_card ?></h1>
        <?php if(isset($validation)){ ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors();?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        <form action="<?= base_url();?>/usuarios/insertar" method="POST" autocomplete="off">
                        <?php csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" class="form-control" name="usuario" id="usuario" value="<?= set_value('usuario');?>" autocomplete="off" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password');?>" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= set_value('nombre');?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="id_caja">Caja</label>
                                        <select class="form-control" name="id_caja" id="id_caja" required>
                                            <option value="">Seleccionar Caja</option>
                                            <?php foreach($cajas as $caja){ ?>
                                                <option value="<?= $caja['id']; ?>" <?php if($caja['id'] == set_value('id_caja')){echo 'selected';}?>><?= $caja['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="id_rol">Rol</label>
                                        <select class="form-control" name="id_rol" id="id_rol" required>
                                            <option value="">Seleccionar Rol</option>
                                            <?php foreach($roles as $rol){ ?>
                                                <option value="<?= $rol['id']; ?>" <?php if($rol['id'] == set_value('id_rol')){echo 'selected';}?>><?= $rol['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br> 

                            <div class="">
                                <a href="<?= base_url();?>/usuarios" class="btn btn-primary">Regresar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                           
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    
</main>
