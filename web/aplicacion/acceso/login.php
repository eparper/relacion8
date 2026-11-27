<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbicacion = [
    [
        "nombre" => "Inicio",
        "url" => "/index.php"
    ],
    [
        "nombre" => "Login"
    ],
    
];

//array de errores para mostrarlos en el formulario (en la vista)
$errores = [];

//si se pulsa aceptar en el formulario
if (isset($_POST["aceptar"])) {

    //si se ha escrito un usuario y contraseña:
    if ((isset($_POST["usuario"])) && (isset($_POST["contrasenia"]))) {
        $usuario = mb_trim($_POST["usuario"]); //guardamos el nick sin espacios al principio o al final
        $usuario = strtolower($usuario); //pasamos el nick a minúsculas porque los métodos usan el nick en minúsculas

        //guardamos contraseña
        $contrasenia = $_POST["contrasenia"];

        //si el usuario y contraseña que se han escrito no se encuentran en la ACL, se muestra un error y no se registra el usuario o no se inicia sesión
        if (!$acl->esValido($usuario, $contrasenia)) {
            $errores["Login"][] = "Usuario o contraseña no válidos.";
        }
        //si el usuario y contraseña son válidos y el usuario existe, se inicia sesión
        else if ($acl->existeUsuario($usuario)) { //si existe el usuario en la acl, se registra en la aplicación (o sea, que inicia sesión)
            $codigoUsu = $acl->getCodUsuario($usuario); //guardamos código del usuario
        
            $nombreUsu = $acl->getNombre($codigoUsu); //nombre del usuario

            $permisosUsu = $acl->getPermisos($codigoUsu); //array permisos del usuario

            //si no se puede registrar el usuario, mandamos un error y se termina la ejecución sin registrarse
            if (!$acceso->registrarUsuario($usuario, $nombreUsu, $permisosUsu)) {
                $errores["Login"][] = "No se ha podido registrar el usuario";
            }
            else {
                $destino = "/index.php";

                //si existe la sesión con página actual, se modifica el destino 
                //y luego se borra la sesión para que no exista siempre la sesión
                //y siempre que hagas login no te lleve a la página que hayas guardado en sesión.
                if (isset($_SESSION["paginaActual"])) {
                    $destino = $_SESSION["paginaActual"];
                    unset($_SESSION["paginaActual"]);
                }

                //si se ha iniciado sesión, se redirecciona al inicio, y depende del usuario
                //se mostrarán unas páginas u otras
                header("Location: $destino"); 
                exit;
            }
            
        }
    }


    
}

//dibuja la plantilla de la vista
inicioCabecera("RELACIÓN 8");
cabecera();
finCabecera();
inicioCuerpo("RELACIÓN 8", $barraUbicacion);
cuerpo($errores); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {

    
}
//vista
function cuerpo(array $errores)
{
?>
    <br><br>
    
    <?php 
    ?>

    <form action="" method="post">

        <?php muestraErrores($errores, "Login") ?>

        <label for="usuario">Usuario: </label>    
        <input type="text" name="usuario">
        
        
        <br><br>

        <label for="contrasenia">Contraseña: </label>    
        <input type="password" name="contrasenia"><br><br>

        <input type="submit" value="Aceptar" name="aceptar">
    
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