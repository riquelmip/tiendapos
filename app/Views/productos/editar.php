<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $titulo_card ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        <form action="<?= base_url();?>/productos/actualizar" method="POST" autocomplete="off">
                            <input type="hidden" name="id" id="id" value="<?= $producto['id']; ?>">
                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Código</label>
                                        <input type="text" class="form-control" name="codigo" id="codigo" value="<?= $producto['codigo']; ?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre_corto">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $producto['nombre']; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Unidad</label>
                                        <select class="form-control" name="id_unidad" id="id_unidad" required>
                                            <option value="">Seleccionar unidad</option>
                                            <?php foreach($unidades as $unidad){ ?>
                                                <option value="<?= $unidad['id']; ?>" <?php if($unidad['id'] == $producto['id_unidad']){echo 'selected';}?>><?= $unidad['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre_corto">Categoría</label>
                                        <select class="form-control" name="id_categoria" id="id_categoria" required>
                                            <option value="">Seleccionar categoría</option>
                                            <?php foreach($categorias as $cat){ ?>
                                                <option value="<?= $cat['id']; ?>" <?php if($cat['id'] == $producto['id_categoria']){echo 'selected';}?>><?= $cat['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Precio Venta</label>
                                        <input type="text" class="form-control" name="precio_venta" id="precio_venta" value="<?= $producto['precio_venta']; ?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre_corto">Precio Compra</label>
                                        <input type="text" class="form-control" name="precio_compra" id="precio_compra" value="<?= $producto['precio_compra']; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Stock Mínimo</label>
                                        <input type="text" class="form-control" name="stock_minimo" id="stock_minimo" value="<?= $producto['stock_minimo']; ?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre_corto">¿Es Inventariable?</label>
                                        <select class="form-control" name="inventariable" id="inventariable" required>
                                            <option value="1" <?php if($producto['inventariable'] == 1){echo 'selected';}?>>Sí</option>
                                            <option value="0" <?php if($producto['inventariable'] == 0){echo 'selected';}?>>No</option>
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
