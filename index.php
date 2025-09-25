<?php 
    include "header.php";
    include "clases/Crud.php";
    $crud = new Crud();
    $contactos = $crud->show_all();
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="h3 mb-0">Lista de contactos</h1>
                        <a href="create.php" class="btn btn-primary">➕ Crear nuevo contacto</a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Descripción</th>
                                    <th>Foto</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($contactos as $contacto): 
                                    $id = $contacto["id"];
                                ?>
                                <tr>
                                    <td><?php echo $contacto["paterno"] ?></td>
                                    <td><?php echo $contacto["materno"] ?></td>
                                    <td><?php echo $contacto["nombre"] ?></td>
                                    <td><?php echo $contacto["telefono"] ?></td>
                                    <td><?php echo $contacto["correo"] ?></td>
                                    <td><?php echo $contacto["descripcion"] ?></td>
                                    <td class="text-center">
                                        <img src="<?php echo "public/upload/".$contacto["foto"] ?>" 
                                             alt="Foto" class="rounded-circle border" width="60" height="60">
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-sm" href="edit.php?id=<?php echo $id; ?>">
                                            ✏️ Editar
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-danger btn-sm" 
                                           href="servidor/destroy.php?id=<?php echo $id; ?>" 
                                           onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                           🗑️ Eliminar
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include "footer.php";
?>
