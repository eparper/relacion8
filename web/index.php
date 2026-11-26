<?php
include_once(dirname(__FILE__) . "/cabecera.php");


//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio"
    ]
    
];

//dibuja la plantilla de la vista
inicioCabecera("Relación 8");
cabecera();
finCabecera();
inicioCuerpo("Relación 8", $barraUbicacion);
cuerpo($acceso);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!-- ESTO VA EN EL HEAD -->
    <?php
}

//vista
function cuerpo(Acceso $acceso)
{
?>
    <br><br>
    <?php
    //En el inicio, si hay usuario con la sesión iniciada, mostramos las páginas index y ver textos
    if ($acceso->hayUsuario()) {
        ?>
        <a href="/aplicacion/personalizar/index.php">Index</a><br>
        <a href="/aplicacion/texto/verTextos.php">Ver Textos</a><br>
        <?php
        if ($acceso->puedePermiso(1)) { //solo usuarios con permiso 1 pueden ver la página personalizar
        ?>
            <a href="/aplicacion/personalizar/personalizar.php">Personalizar</a>
            
        <?php } ?>
        

<?php } ?>
<?php
}
