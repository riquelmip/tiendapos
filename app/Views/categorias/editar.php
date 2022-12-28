<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $titulo_card ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        <form action="<?= base_url();?>/categorias/actualizar" method="POST" autocomplete="off">
                            <input type="hidden" name="id" id="id" value="<?= $categoria['id']; ?>">
                            <div class="row">
                                <div class="col-sm-12" style="padding-top: 7px;">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $categoria['nombre']; ?>" autofocus required>
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
