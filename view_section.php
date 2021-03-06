<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javascript</title>

    <!--Cargamos nuestras hojas de estilo-->
    <link rel="stylesheet" href="/programaycompila.com/.css/plantillaReset.css">
    <link rel="stylesheet" href="/programaycompila.com/.css/general.css">
    <link rel="stylesheet" href="/programaycompila.com/.css/estilosPaginasGeneral.css">
    <link rel="stylesheet" href="/programaycompila.com/.css/estilosSeccionesArticulos.css">

    <!--Cargamos jquery y nuestros scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/programaycompila.com/.js/iconos.js"></script>
    <script src="/programaycompila.com/.js/eliminarDivCookies.js"></script>
    <script src="/programaycompila.com/.js/menuDesplegable.js"></script>
    
    <?php
        require(".php/controllers/sectionsController.php");
        session_start();

        require(".php/scripts/elementosComunes/cookieRecordarSesion.php");
    ?>

</head>

<body>
    <?php
        require(".php/scripts/elementosComunes/navMobile.php");
        require(".php/scripts/elementosComunes/nav.php");
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <div>
    <h1 id="tituloPagina" class="tituloPagCompleto">programaYcompila ></h1><h1 class="tituloPagCompleto"><?php echo $_GET["section"] ?></h1>
    </div>
    
    <section>
        
        <?php
            $controlador = new SectionsController();

            $seccion = $_GET['section'];

            $controlador->muestraPost("SELECT p.id, p.imagenPrincipal, p.titulo, p.resumen, p.contenido, p.seccion, u.nick, p.fecha FROM post p INNER JOIN usuario u on p.id_usuario = u.id WHERE seccion = '$seccion'", $seccion);

            if(isset($_SESSION["rol"])){
                if($_SESSION["rol"] == 2 || $_SESSION["rol"] == 3 || $_SESSION["rol"] == 4){
                    echo
                    "<a id=pestañaNuevoPost href='nuevo_post.php'><p id=pestañaNuevoPostParrafo>Nuevo post</p></a>";
                }
            }
        ?>

    </section>
    
    <?php
        require(".php/scripts/elementosComunes/aside.php");
    ?>
    

    <?php
        require(".php/scripts/elementosComunes/footer.php");
        require(".php/scripts/elementosComunes/footerMobile.php");
    ?>
</body>
</html>