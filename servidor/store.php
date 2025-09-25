
<?php 
    include "../clases/Crud.php";
    $crud = new Crud();
    //sirve para ver que contiene un objeto
    $datos = [
        "paterno" => $_POST["paterno"],
        "materno" => $_POST["materno"],
        "nombre" => $_POST["nombre"],
        "telefono" => $_POST["telefono"],
        "correo" => $_POST["correo"],
        "descripcion" => $_POST["descripcion"]
    ];

    $nombre_foto = $crud->generar_nombre_foto($_FILES["foto"]["name"]);
    $datos_file = [
        "nombre" => $nombre_foto,
        "origen" => $_FILES["foto"]["tmp_name"],
        "destino" => "../public/upload/" . $nombre_foto,
    ];
    $id_contacto = $crud->store($datos);
    
    if ($id_contacto > 0) {

        if($crud->store_path($id_contacto, 
        $datos_file["nombre"], 
        $datos_file["destino"])){
           
            if(!move_uploaded_file($datos_file["origen"],
                                    $datos_file["destino"]))
            {
                echo "Fallo al mover";
            } else {
                header("location:../index.php");
            }
        } else {
            echo "Fallo al agregar la ruta";
        }
        
    } else {
        echo "Fallo al agregar";
    }
?>