<?php
    require("../models/administraContenido.php");

    $administraContenido = new AdministraContenido();

    $titulo = $_GET["name"];

    $post = $administraContenido->getPosts("SELECT * FROM post WHERE titulo = '" . $titulo ."'");

    $administraContenido->borraPost($titulo);

    header("Location: /aprendiendoaprogramar.com/view_section.php?section=" . $post[0]->getSeccion());
?>