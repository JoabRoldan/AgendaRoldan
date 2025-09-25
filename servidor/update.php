
<?php 
    include "../clases/Crud.php";
    $crud = new Crud();
    $id = $_POST["id"];
    $datos = [
        "paterno" => $_POST["paterno"],
        "materno" => $_POST["materno"],
        "nombre" => $_POST["nombre"],
        "telefono" => $_POST["telefono"],
        "correo" => $_POST["correo"],
        "descripcion" => $_POST["descripcion"]
    ];

    // Buscar la foto actual usando el método de Crud
    $foto_actual = $crud->get_foto_contacto($id);
    $conn = $crud->conectar();

    $nueva_foto = isset($_FILES["foto"]) && $_FILES["foto"]["name"] != "";
    if ($nueva_foto) {
        $nombre_foto = $crud->generar_nombre_foto($_FILES["foto"]["name"]);
        $origen_foto = $_FILES["foto"]["tmp_name"];
        $destino_foto = "../public/upload/" . $nombre_foto;
        // Eliminar la foto anterior si existe
        if ($foto_actual && file_exists($foto_actual["ruta"])) {
            unlink($foto_actual["ruta"]);
        }
        // Guardar la nueva foto
        if (move_uploaded_file($origen_foto, $destino_foto)) {
            // Actualizar la base de datos con la nueva foto usando Crud
            $crud->update_foto_contacto($id, $nombre_foto, $destino_foto);
        } else {
            echo "Fallo al subir la nueva foto";
            exit;
        }
    }

    if ($crud->update($id,$datos)) {
        header("location:../index.php");
    } else {
        echo "Fallo al agregar";
    }
?>