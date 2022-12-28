<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $titulo_card ?></h1>

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
                                        <input type="text" class="form-control" name="codigo" id="codigo" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" required>
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
                                                <option value="<?= $unidad['id']; ?>"><?= $unidad['nombre']; ?></option>
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
                                                <option value="<?= $cat['id']; ?>"><?= $cat['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio Venta</label>
                                        <input type="text" class="form-control" name="precio_venta" id="precio_venta" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio Compra</label>
                                        <input type="text" class="form-control" name="precio_compra" id="precio_compra" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="stock_minimo">Stock Mínimo</label>
                                        <input type="text" class="form-control" name="stock_minimo" id="stock_minimo" autofocus required>
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
