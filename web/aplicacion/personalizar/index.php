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

//VISITAS
if (isset($_COOKIE["visitas"])) {
    $contadorVisitas = $_COOKIE["visitas"];
    $contadorVisitas++;
    setcookie("visitas", $contadorVisitas); //le ponemos el valor nuevo a la cookie
}
else {
    $contadorVisitas = 1;
    setcookie("visitas", $contadorVisitas); //la cookie guarda el value en texto
}

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 8");
cabecera($datos);
finCabecera();
inicioCuerpo("RELACIÓN 8", $barraUbicacion);
cuerpo($contadorVisitas); //llamo a la vista
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
function cuerpo(int $contadorVisitas)
{
?>
    <br><br>
    
    <?php 

    echo "Hola mundo <br>";        

    echo "Visitas: $contadorVisitas <br>".PHP_EOL;




}

