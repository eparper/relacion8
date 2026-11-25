<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "VerTextos"
    ],
    
];

//si existe la sesión textos:
if (isset($_SESSION["textos"])) { //se guardará en sesión una copia del array $textos
    $textos = $_SESSION["textos"];
}
else { //si no existe, creamos el array vacío:

    //array textos 
    $textos = [];
}


$errores = [];

if (isset($_POST["registrar"])) {

    

    if (isset($_POST["inputTexto"])) {

        $texto = $_POST["inputTexto"];

        if (mb_trim($texto) == "") {
            $errores["texto"][] = "La cadena de texto no es válida";
        }  

    }

    if (!$errores) { //si no hay errores

        $obTexto = new RegistroTexto($_POST["inputTexto"]);

        //añadimos al array que está en la cabecera:
        array_push($textos, $obTexto);

        $_SESSION["textos"] = $textos;


    }


}

if (isset($_POST["limpiar"])) {

    $textos = [];
    $_SESSION["textos"] = $textos;
}

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 8");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 8", $barraUbicacion);
cuerpo($errores, $textos); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {

    
}
//vista
function cuerpo(array $errores, array $textos)
{
?>
    <br><br>
    
    <?php 

    

    formulario($errores, $textos);


}

/**
 * Función que muestra el formulario
 *
 * @param array $datos Array donde se le pasan todos los datos con posiciones asociativas
 * @param array $errores Matriz donde se le pasan los errores
 * @return void
 */
function formulario(array $errores, array $textosRegistrados) {

    
    ?>

    <form action="" method="post">
        <label for="inputTexto">Introduce el texto:</label>
        <input type="text" name="inputTexto"><?php muestraErrores($errores, "texto"); ?>

        <input type="submit" value="Registrar" name="registrar">

        <input type="submit" value="Limpiar" name="limpiar">

        <textarea name="taTextos" cols="70" rows="20" readonly><?php 
                foreach ($textosRegistrados as $texto) {

                    echo $texto->getCadena() . " " . $texto->getFechaHora()->format("d/m/Y H:i:s") . "\n";
                }
            
            ?>
        </textarea><br>

        

    </form>

    

    <?php
}

/**
 * Función que pinta un span con los errores para ponerlos al lado de cada campo
 *
 * @param array $errores Matriz de errores que se le pasa
 * @param string $nombreCampo Nombre del campo en la matriz para poder encontrarlo e imprimir el error correcto
 * @return void
 */
function muestraErrores (array $errores, string $nombreCampo):void {
    if ($errores) {   //mostrar los errores 
        
        
        foreach ($errores as $clave => $valor) {
            if ($clave == $nombreCampo) {
                //echo "<span class='error'>";
                foreach ($valor as $error)
                    echo "<span class='error'>$clave => $error</span><br><br>" . PHP_EOL;
                //echo "</span>";
            }
            

            
        }
        
    }
}

