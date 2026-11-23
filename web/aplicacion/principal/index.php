<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Tienda"
    ],
    
];





//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 8");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 8", $barraUbicacion);
cuerpo(); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo()
{
?>
    <br><br>
    
        <?php 

            

    




}

