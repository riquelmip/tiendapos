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
                        <form action="<?= base_url();?>/categorias/insertar" method="POST" autocomplete="off">
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
                                <a href="<?= base_url();?>/categorias" class="btn btn-primary">Regresar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                           
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    
</main>
