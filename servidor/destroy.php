
<?php 
    include "../clases/Crud.php";
    $id = $_GET['id'];
    $crud = new Crud();

    // Obtener la foto antes de eliminar el contacto
    $foto = $crud->get_foto_contacto($id);


    // Eliminar primero la foto de la base de datos (por restricción de clave foránea)
    $crud->eliminar_foto_contacto($id);

    if($crud->destroy($id)){
        // Eliminar la foto física si existe
        if ($foto && file_exists($foto["ruta"])) {
            unlink($foto["ruta"]);
        }
        header("location:../index.php");
    } else {
        echo "Fallo al eliminar!!";
    }

