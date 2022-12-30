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
                        
                        <form action="<?= base_url();?>/configuracion/actualizar" method="POST" autocomplete="off">
                        <?php csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="tienda_nombre">Nombre de la Tienda</label>
                                        <input type="text" class="form-control" name="tienda_nombre" id="tienda_nombre" value="<?= $nombre;?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="tienda_rfc">RFC</label>
                                        <input type="text" class="form-control" name="tienda_rfc" id="tienda_rfc" value="<?= $rfc;?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="tienda_telefono">Teléfono</label>
                                        <input type="text" class="form-control" name="tienda_telefono" id="tienda_telefono" value="<?= $telefono;?>" autofocus required>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="tienda_email">Correo Eléctronico</label>
                                        <input type="text" class="form-control" name="tienda_email" id="tienda_email" value="<?= $correo;?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="tienda_direccion">Dirección</label>
                                        <textarea name="tienda_direccion" id="tienda_direccion" class="form-control" cols="30" rows="3"><?= $direccion;?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="ticket_leyenda">Frase del Ticket</label>
                                        <textarea name="ticket_leyenda" id="ticket_leyenda" class="form-control" cols="30" rows="3"><?= $frase_ticket;?></textarea>
                                    </div>
                                </div>
                            </div>

                            <br> 

                            <div class="">
                                <a href="<?= base_url();?>/configuracion" class="btn btn-primary">Regresar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                           
                        </form>
                       

                    </div>
                </div>
            </div>
        </div>

    </div>
    
</main>
