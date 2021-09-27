<?php 

/*Archivo de conexion*/

/*contenga la informarcion que se requiere de la base de datos*/
define('_HOST_NAME','localhost');
/**/
define('_DATABASE_NAME','semana6');
/*el nombre de la base de datos*/
define('_DATABASE_USER_NAME','root');
/*el usuario de la base de datos*/
define('_DATABASE_PASSWORD','');
/**/

$MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);
/*Para la conexion se necesita */
/* MySQLi: crea el objeto de mysql en las nuevas versiones de php */


if($MySQLiconn->connect_errno)
{
    /*Para verificar el intento de conexion a traido un error*/
    die("ERROR: ->".$MySQLiconn->connect_error);
    /*Cortar la ejecucion y se mostrara el error*/
}

?>