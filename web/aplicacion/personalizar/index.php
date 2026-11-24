<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Index"
    ],
    
];

$datos = [];

//antes de todo, comprobamos si las cookies existen y si no, ponemos los colores por defecto
if (isset($_COOKIE["fondo"])) {
    $datos["fondo"] = $_COOKIE["fondo"];
}
else { //si no hay cookie lo ponemos en blanco por defecto
    $datos["fondo"] = "blanco";
}

//lo mismo para el color de texto
if (isset($_COOKIE["texto"])) {
    $datos["texto"] = $_COOKIE["texto"];
}
else { //si no hay cookie lo ponemos en negro por defecto
    $datos["texto"] = "negro";
}



//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 8");
cabecera($datos);
finCabecera();
inicioCuerpo("RELACIÓN 8", $barraUbicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera(array $datos) {

    ?>
    <style>
        #documento {
            background-color: <?php echo COLORESFONDO[$datos["fondo"]]; ?>;
            color: <?php echo COLORESTEXTO[$datos["texto"]]; ?>;
        }
    </style>
    <?php
}
//vista
function cuerpo()
{
?>
    <br><br>
    
    <?php 

    echo "Hola mundo";        

    




}

