<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

if (!$acceso->hayUsuario()) {
    header("Location: /aplicacion/acceso/login.php");
}

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
if (isset($_COOKIE["visitas"])) { //si existe la cookie
    $contadorVisitas = $_COOKIE["visitas"]; //recogemos el valor de la cookie
    $contadorVisitas++; //actualizamos el valor de la cookie
    //y actualizamos la cookie
    setcookie("visitas", $contadorVisitas, time() + 60 * 60 * 24 * 3, "/"); //le ponemos el valor nuevo a la cookie
}
else { //si NO existe la cookie
    $contadorVisitas = 1; //iniciamos el contador a 1 porque siempre será una visita al empezar
    setcookie("visitas", $contadorVisitas, time() + 60 * 60 * 24 * 3, "/"); //la cookie guarda el value en texto
    //le ponemos / para que esté en todas partes
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

