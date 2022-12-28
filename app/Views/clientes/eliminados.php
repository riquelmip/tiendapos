<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $titulo_card ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>
                            <a href="<?= base_url();?>/clientes" class="btn btn-primary">Clientes</a>
                        </p>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($clientes as $cliente){?>
                                        <tr>
                                            <td><?= $cliente['id']; ?></td>
                                            <td><?= $cliente['nombre']; ?></td>
                                            <td><?= $cliente['direccion']; ?></td>
                                            <td><?= $cliente['telefono']; ?></td>
                                            <td><?= $cliente['correo']; ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="#" data-href="<?= base_url('/clientes/reingresar/'.$cliente['id'])?>"  data-bs-toggle="modal" data-bs-target="#modal-confirm" data-placement="top" title="Reingresar registro" class="btn btn-info"><i class="fa fa-arrow-up"></i></a>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reingresar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Desea reingresar este registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a type="button" class="btn btn-danger btn-ok">Sí</a>
      </div>
    </div>
  </div>
</div>