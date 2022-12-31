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
                        <form action="<?= base_url();?>/cajas/insertar" method="POST" autocomplete="off">
                        <?php csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="num_caja">Número de Caja</label>
                                        <input type="text" class="form-control" name="num_caja" id="num_caja" value="<?= set_value('num_caja');?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="folio">Folio</label>
                                        <input type="text" class="form-control" name="folio" id="folio" value="<?= set_value('folio');?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= set_value('nombre');?>" autofocus required>
                                    </div>
                                </div>
                            </div>

                            <br> 

                            <div class="">
                                <a href="<?= base_url();?>/cajas" class="btn btn-primary">Regresar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                           
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    
</main>
