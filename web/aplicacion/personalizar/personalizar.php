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

    <!-- <style>
        .tarjeta {
            background-color: ;
        }
    </style> -->

    <label for="comboColorFondo">Color de fondo: </label>
    <select name="comboColorFondo">
        <?php 
        
        foreach (COLORESFONDO as $colorFondo => $rgb) {

            ?>
            <option value="<?= $colorFondo ?>"><?= $colorFondo ?></option>
            <?php
        }
        
        ?>
    </select> <br>

    <label for="comboColorTexto">Color de texto: </label>
    <select name="comboColorTexto">
        <?php 
        
        foreach (COLORESTEXTO as $colorTexto => $rgb) {

            ?>
            <option value="<?= $colorTexto ?>"><?= $colorTexto ?></option>
            <?php
        }
        
        ?>
    </select>
    
    <?php 

            

    




}

