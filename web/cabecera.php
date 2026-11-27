<?php
//no quiero que se muestre ningún error: 
//error_reporting(0);
date_default_timezone_set("Europe/Berlin");

define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO","desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO=="produccion")
    error_reporting(0);
    else 
        error_reporting(E_ALL & ~E_DEPRECATED);  

// spl_autoload_register(function ($clase){
//     $ruta=RUTABASE."/aplicacion/clases/";
//     $fichero=$ruta."$clase.php";
    
//     if (file_exists($fichero))
//         {
//             require_once($fichero);
//         }
//       else
//         {
//             throw new Exception("La clase $clase no se ha encontrado.");
//         }
// });

//para autocarga de muchas carpetas:
spl_autoload_register(function ($clase){
    $carpetas = [
        RUTABASE . "/aplicacion/clases/",
        RUTABASE . "/scripts/clases/"
    ];

    foreach ($carpetas as $ruta) {
        $fichero = $ruta . "$clase.php";

        // Si encontramos el archivo en esta carpeta, lo cargamos y salimos de la función
        if (file_exists($fichero)) {
            require_once $fichero;
            return; // Éxito: detenemos el autoload para esta clase
        }
    }

    throw new Exception("La clase '$clase' no se ha encontrado en ninguna de las rutas configuradas.");
});


include(RUTABASE."/aplicacion/plantilla/plantilla.php");

require_once(RUTABASE."/scripts/librerias/validacion.php");

//creo todos los objetos que necesita mi aplicación


const COLORESTEXTO = [
    "negro" => "rgb(0, 0, 0)",
    "blanco" => "rgb(255, 255, 255)",
    "rojo" => "rgb(255, 0, 0)",
    "verde" => "rgb(0, 255, 0)",
    "rosa" => "rgb(255, 192, 203)",
    "azul" => "rgb(0, 110, 255)"
];

const COLORESFONDO = [
    "blanco" => "rgb(255, 255, 255)",
    "negro" => "rgb(0, 0, 0)",
    "azul" => "rgb(0, 110, 255)",
    "rojo" => "rgb(255, 0, 0)"
];

// const COLORESFONDO = [
//     "negro" => "black",
//     "blanco" => "white",
//     "azul" => "blue",
//     "rojo" => "red"
// ];

//iniciar sesión 
session_start();

//el objeto de la clase Acceso, se crea aquí para tenerlo en todas partes
$acceso = new Acceso();
//el objeto de la clase del ACL para tenerlo en todas partes
$acl = new ACLArray();

