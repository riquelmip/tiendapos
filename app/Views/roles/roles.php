<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $titulo_card ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>
                            <a href="<?= base_url();?>/roles/nuevo" class="btn btn-primary">Agregar</a>
                            <a href="<?= base_url();?>/roles/eliminados" class="btn btn-warning">Eliminados</a>
                        </p>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($roles as $rol){?>
                                        <tr>
                                            <td><?= $rol['id']; ?></td>
                                            <td><?= $rol['nombre']; ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="<?= base_url('/roles/editar/'.$rol['id'])?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" data-href="<?= base_url('/roles/eliminar/'.$rol['id'])?>"  data-bs-toggle="modal" data-bs-target="#modal-confirm" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>

    </div>
    
</main>

<!-- Modal -->
<div class="modal fade" id="modal-confirm" tabindex="-1" aria-labelledby="modal-confirm" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Desea eliminar este registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a type="button" class="btn btn-danger btn-ok">Sí</a>
      </div>
    </div>
  </div>
</div>
