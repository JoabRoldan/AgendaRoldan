<?php
    class Conexion{
        public function conectar(){
            $host="localhost";
            $usuario="backend";
            $password="backend2025";
            $base="joab_agenda";
            $conexion=mysqli_connect(
                $host,$usuario,$password,$base
            );
            return $conexion;
        }
    }

    $obj=new Conexion();
    if($obj -> conectar()){
        
    }else{
        echo "no funciona";
    }
   /*  print_r($obj -> conectar()); */ /* -> manda llamar un metodo */
