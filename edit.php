<?php
    include "header.php";
    include "clases/Crud.php";
    $crud = new Crud();
    $contacto = $crud->show($_GET["id"]);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-3">
                <div class="card-body">
                    <h1 class="text-center mb-4">Actualizar contacto</h1>
                    <form action="servidor/update.php" method="post" enctype="multipart/form-data">
                        
                        <!-- Campo oculto para el ID -->
                        <input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">

                        <div class="mb-3">
                            <label for="paterno" class="form-label">Apellido paterno</label>
                            <input type="text" class="form-control" name="paterno" id="paterno" 
                                   value="<?php echo $contacto['paterno']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="materno" class="form-label">Apellido materno</label>
                            <input type="text" class="form-control" name="materno" id="materno" 
                                   value="<?php echo $contacto['materno']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" 
                                   value="<?php echo $contacto['nombre']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" 
                                   value="<?php echo $contacto['telefono']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" 
                                   value="<?php echo $contacto['correo']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required><?php echo $contacto['descripcion']; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Agrega una foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
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
