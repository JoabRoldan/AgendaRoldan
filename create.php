<?php
    include "header.php";
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-3">
                <div class="card-body">
                    <h1 class="text-center mb-4">Crear nuevo contacto</h1>
                    <form action="servidor/store.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="paterno" class="form-label">Apellido paterno</label>
                            <input type="text" class="form-control" name="paterno" id="paterno">
                        </div>

                        <div class="mb-3">
                            <label for="materno" class="form-label">Apellido materno</label>
                            <input type="text" class="form-control" name="materno" id="materno">
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono">
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo">
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Agrega una foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>