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
                        <form action="<?= base_url();?>/productos/insertar" method="POST" autocomplete="off">
                        <?php csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" name="codigo" id="codigo" value="<?= set_value('codigo');?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= set_value('nombre');?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="id_unidad">Unidad</label>
                                        <select class="form-control" name="id_unidad" id="id_unidad" required>
                                            <option value="">Seleccionar unidad</option>
                                            <?php foreach($unidades as $unidad){ ?>
                                                <option value="<?= $unidad['id']; ?>" <?php if($unidad['id'] == set_value('id_unidad')){echo 'selected';}?>><?= $unidad['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="id_categoria">Categoría</label>
                                        <select class="form-control" name="id_categoria" id="id_categoria" required>
                                            <option value="">Seleccionar categoría</option>
                                            <?php foreach($categorias as $cat){ ?>
                                                <option value="<?= $cat['id']; ?>" <?php if($cat['id'] == set_value('id_categoria')){echo 'selected';}?>><?= $cat['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio Venta</label>
                                        <input type="text" class="form-control" name="precio_venta" id="precio_venta" value="<?= set_value('precio_venta');?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio Compra</label>
                                        <input type="text" class="form-control" name="precio_compra" id="precio_compra" value="<?= set_value('precio_compra');?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="stock_minimo">Stock Mínimo</label>
                                        <input type="text" class="form-control" name="stock_minimo" id="stock_minimo" value="<?= set_value('stock_minimo');?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="inventariable">¿Es Inventariable?</label>
                                        <select class="form-control" name="inventariable" id="inventariable" required>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br> 

                            <div class="">
                                <a href="<?= base_url();?>/productos" class="btn btn-primary">Regresar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                           
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    
</main>
