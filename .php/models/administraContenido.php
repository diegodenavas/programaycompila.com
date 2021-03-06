<?php
    require_once("conexionBDD.php");
    require("post.php");
    require_once("usuario.php");

    class AdministraContenido{

        //Methods

        public function getPosts(String $consulta){
            $conex = new ConexionBDD();

            $statement = $conex->ejecutarConsulta($consulta);

            $statement->execute(array());

            $cont = 0;

            while ($fila = $statement->fetch(PDO::FETCH_BOTH)) {

                $arrayPosts[$cont] = new Post($fila[1], $fila[2], nl2br($fila[3]), nl2br($fila[4]), $fila[5], $fila[6]);

                $arrayPosts[$cont]->setFecha($fila[7]);

                $cont++;
            }

            if(!isset($arrayPosts)){
                return "No se ha ejecutado la consulta correctamente";
            }

            $conex = null;

            return $arrayPosts;
        }


        public function borraPost($titulo){
            $conex = new ConexionBDD();
            $statement = $conex->ejecutarConsulta("DELETE FROM post WHERE titulo = '". $titulo ."'");

            $statement->execute();

            $conex = null;
        }



        public function getUsuarios(String $consulta){
            $conex = new ConexionBDD();

            $statement = $conex->ejecutarConsulta($consulta);

            $statement->execute(array());

            $cont = 0;

            while ($fila = $statement->fetch(PDO::FETCH_BOTH)) {

                $arrayUsuarios[$cont] = new Usuario($fila[1], "", $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8]);
                $arrayUsuarios[$cont]->setRol($fila[9]);
                $arrayUsuarios[$cont]->setId($fila[0]);

                $cont++;
            }

            $conex = null;

            if(!isset($arrayUsuarios)){
                return 0;
            }
            return $arrayUsuarios;
        }

        
        public function borraUsuario($nick){
            $conex = new ConexionBDD();
            $statement = $conex->ejecutarConsulta("DELETE FROM usuario WHERE nick = '". $nick ."'");

            $statement->execute();

            $conex = null;
        }

    }

?>