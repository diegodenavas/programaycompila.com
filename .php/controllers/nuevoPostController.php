<?php
    require("../models/post.php");
    require("../models/conexionBDD.php");

    session_start();

    $imgPrincipal = $_POST["imgPrincipal"];
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $seccion = $_POST["seccion"];

    $post = new Post($imgPrincipal, $titulo, $contenido, $seccion, $_SESSION["nick_usuario"]);

    $conexionPost = new ConexionBDD();

    $statement = $conexionPost->ejecutarConsulta("INSERT INTO post(imagenPrincipal, titulo, contenido, seccion, id_usuario, fecha) VALUES(?, ?, ?, ?, (SELECT id FROM usuario WHERE nick=?), curdate())");

    if($statement->execute(array($post->getUrlImagen(), $post->getTitulo(), $post->getContenido(), $post->getSeccion(), $post->getUsuario() ))){
        echo "post insertado en la bdd";
        header("Location: /aprendiendoaprogramar.com/view_post.php?" . "post=".$post->getTitulo());
    }

?>