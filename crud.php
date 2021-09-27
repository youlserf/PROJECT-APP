<?php
/*Una funcion que permite hacer la llamada de un archivo e incluir ese archivo en este nuevo archivo y que se hara solo una vez*/
include_once 'db.php';

/*codigo para la insercion de datos*/
if(isset($_POST['save']))
{
    $fn = $MySQLiconn->real_escape_string($_POST['fn']);
    $ln = $MySQLiconn->real_escape_string($_POST['ln']);

    $SQL = $MySQLiconn->query("INSERT INTO data (fn,ln) VALUES ('$fn','$ln')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}

/*codigo para la eliminacion de datos*/
if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['del']);

    header("Location: index.php");
}

/*codigo para la actualizacion de los datos */
if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM data WHERE id=".$_GET['edit']);
    $getROW=$SQL->fetch_array();
    /*fecth_array: convierte la data que esta como un objeto a un arreglo */
}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE data SET fn='".$_POST['fn']."', ln='".$_POST['ln']."'WHERE id=".$_GET['edit']);
    header("Location: index.php");
}
?>