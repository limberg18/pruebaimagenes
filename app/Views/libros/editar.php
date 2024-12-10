<?= $cabecera ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del libro</h5>
        <p class="card-text">
        <form action="<?= base_url('actualizar') ?>" method="post" enctype="multipart/form-data">
            <br class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" class="form-control" type="text" name="nombre" value="<?= $libro['nombre'] ?>">
              <br>
            <input type="hidden" name="id" id="id" value="<?= $libro['id'] ?>">
            <div class="form-group">
                <img src="<?= base_url() ?>/uploads/<?= $libro['imagen'] ?>" width="150" height="150">

                <br>
                <input id="imagen" class="form-control-file" type="file" name="imagen">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Guardar</button>
        </form>
        </p>
    </div>


    <?= $piepagina ?>