<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Personalizar"
    ],
    
];

$errores = [];
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

$colorFondoSeleccionado = $datos["fondo"];
$colorTextoSeleccionado = $datos["texto"];

//si pulsamos en Aceptar
if (isset($_POST["aceptar"])) {

    if (isset($_POST["comboColorFondo"])) {
        $colorFondo = $_POST["comboColorFondo"];
        $datos["fondo"] = $colorFondo;

        setcookie("fondo", $datos["fondo"], time() + 60 * 60 * 24 * 3, "/");
       
    }

    if (isset($_POST["comboColorTexto"])) {
        $colorTexto = $_POST["comboColorTexto"];
        $datos["texto"] = $colorTexto;

        
        setcookie("texto", $datos["texto"], time() + 60 * 60 * 24 * 3, "/");
    }

    //hay que recargar para que se vean los cambios 
    header("Location: /aplicacion/personalizar/personalizar.php");
    exit;
}



//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 8");
cabecera($datos);
finCabecera();
inicioCuerpo("RELACIÓN 8", $barraUbicacion);
cuerpo($colorFondoSeleccionado, $colorTextoSeleccionado); //llamo a la vista
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
function cuerpo(string $colorFondoSeleccionado, string $colorTextoSeleccionado)
{
?>
    <br><br>

    

    <form action="" method="post">
        <label for="comboColorFondo">Color de fondo: </label>
        <select name="comboColorFondo">
            <?php 
            
            
            foreach (COLORESFONDO as $colorFondo => $rgb) {
                
                if (isset($_COOKIE["fondo"]) && $colorFondo == $_COOKIE["fondo"]) {
                    ?>
                    <option value="<?= $colorFondo ?>" selected><?= $colorFondo ?></option>
                    <?php
                }   
                else {
                    ?>
                    <option value="<?= $colorFondo ?>"><?= $colorFondo ?></option>
                    <?php
                } 
                
                
            }
            
            ?>
        </select> <br>

        <label for="comboColorTexto">Color de texto: </label>
        <select name="comboColorTexto">
            <?php 
            $existeColorTexto = false;
            
            foreach (COLORESTEXTO as $colorTexto => $rgb) {
                if (isset($_COOKIE["texto"]) && $colorTexto == $_COOKIE["texto"]) {
                    ?>
                    <option value="<?= $colorTexto ?>" selected><?= $colorTexto ?></option>
                    <?php
                }   
                else {
                    ?>
                    <option value="<?= $colorTexto ?>"><?= $colorTexto ?></option>
                    <?php
                } 
            }
            
            ?>
        </select>

        <input type="submit" class="boton" value="Aceptar" name="aceptar">
    </form>
    <?php 

            

    




}

