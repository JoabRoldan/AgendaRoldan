  
<?php 
    include "Conexion.php";

    class Crud extends Conexion {
          // Elimina la foto de la base de datos por id_contacto
        public function eliminar_foto_contacto($id_contacto) {
            $conn = parent::conectar();
            $sql = "DELETE FROM t_fotos WHERE id_contacto = '$id_contacto'";
            return mysqli_query($conn, $sql);
        }
        // Genera un nombre único y corto para la foto, manteniendo la extensión
        public function generar_nombre_foto($original) {
            $ext = pathinfo($original, PATHINFO_EXTENSION);
            $nombre = uniqid('foto_', true) . '.' . $ext;
            return $nombre;
        }
        public function update_foto_contacto($id_contacto, $nombre, $ruta) {
            $conn = parent::conectar();
            $sql = "UPDATE t_fotos SET nombre = '$nombre', ruta = '$ruta' WHERE id_contacto = '$id_contacto'";
            return mysqli_query($conn, $sql);
        }
        public function get_foto_contacto($id_contacto) {
            $conn = parent::conectar();
            $sql = "SELECT nombre, ruta FROM t_fotos WHERE id_contacto = '$id_contacto'";
            $res = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($res)) {
                return $row;
            }
            return null;
        }
        
        public function store($datos){
            $conn = parent::conectar();
            $sql = "INSERT INTO t_contactos (paterno, 
                                            materno, 
                                            nombre,
                                            telefono,
                                            correo,
                                            descripcion) 
                    VALUES ('". $datos["paterno"] ."' , 
                            '". $datos["materno"] . "' ,
                            '". $datos["nombre"] ."',
                            '". $datos["telefono"] ."' ,
                            '". $datos["correo"] ."' ,
                            '". $datos["descripcion"] ."' 
                            )";
            $exec = mysqli_query($conn, $sql);
            $id_contacto = mysqli_insert_id($conn);

            return $id_contacto;
        }
        public function show_all(){
            $conn = parent::conectar();
            $sql = "SELECT C.* , F.nombre as foto 
                    FROM t_contactos AS C 
                    INNER JOIN t_fotos AS F
                    ON C.id = F.id_contacto
                    ";
            $exec = mysqli_query($conn, $sql);
            $datos = array();
            while($row = mysqli_fetch_assoc($exec)){
                $datos[] = $row;
            }
            return $datos;
        }

        public function destroy($id){
            $conn = parent::conectar();
            $sql = "DELETE FROM t_contactos WHERE id = '$id'";
            $exec = mysqli_query($conn, $sql);
            return $exec;
        }

        public function show($id){
            $conn = parent::conectar();
            $sql = "SELECT * FROM t_contactos WHERE id = '$id'";
            $exec = mysqli_query($conn, $sql);
            $contacto = mysqli_fetch_assoc($exec);
            return $contacto;
        }
        public function update($id,$datos){
            $conn = parent::conectar();
            $paterno = $datos["paterno"];
            $materno = $datos["materno"];
            $nombre = $datos["nombre"];
            $telefono = $datos["telefono"];
            $correo = $datos["correo"];
            $descripcion = $datos["descripcion"];
            $sql = "UPDATE t_contactos SET paterno = '$paterno', 
                                            materno = '$materno', 
                                            nombre = '$nombre', 
                                            telefono = '$telefono', 
                                            correo = '$correo', 
                                            descripcion = '$descripcion' 
                    WHERE id = '$id'";
            $exec = mysqli_query($conn, $sql);
            return $exec;
        }
        public function store_path($id_contacto,$nombre, $ruta){
            $conn = parent::conectar();
            $sql = "INSERT INTO t_fotos (id_contacto, nombre, ruta) 
                        VALUES ('$id_contacto', '$nombre', '$ruta')";
            $exec = mysqli_query($conn, $sql);
            return $exec;
        }
    }

?>