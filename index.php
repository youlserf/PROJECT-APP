<?php
include_once 'crud.php';
/*Para que utilice el archivo crud.php para las operaciones*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Ejemplo CRUD</title>
</head>
<body>
    <!--  center: para mantener todos los elementos del texto-->
    <center>
        <br><br>

        <div id="form">
          <form  method="post">
              <!--Para organizar la infromacion un table-->
              <table width="100%" border="1" cellpadding="15">
                  <!-- cellpadding: especifica el espacio, en píxeles, entre la pared de la celda y su contenido-->
                  <tr>
                      <td>
                          <input type="text" name="fn" placeholder="Nombre"value="<?php
                          if(isset($_GET['edit'])) echo $getROW['fn']; ?>">
                      </td>
                  </tr>

                  <tr>
                      <td>
                          <input type="text" name="ln" placeholder="Apellido" value="<?php
                          if(isset($_GET['edit'])) echo $getROW['ln']; ?>">
                      </td>

                  </tr>

                  <tr>
                      <td>
                          <?php 
                          
                            if(isset($_GET['edit'])){
                                ?>
                                <button type="submit" name="update">Editar</button>
                                <?php 
                            }
                            else{
                                ?>
                                <button type="submit" name="save">Registrar</button>
                                <?php
                            }
                          ?>

                      </td>

                  </tr>
              </table>
          </form>
          <br><br>

          <!--Tabla que servirá para listar los registros que se encuentran en la base de datos-->
          <table width="100%" border="1" cellpadding="15" align="center">
              <?php
              /*una variable para el recorrido para los registros en la tabla */
              /*escribimos el objeto de conexion a la bd mysqliconn */
              $res = $MySQLiconn->query("SELECT * FROM data");
              /*al traer todo de la tabla se hara un estructura repetitiva */
              /*row va ser igual a una fila que se tenga en nuestro objeto 
              - consigue el primero va escribirlo, asi*/
              while ($row=$res->fetch_array())
              {
              ?>
                <!--la tabla generara una nueva fila y dentro de esa fila se genera columnas
                - en echo va escribir lo que consiga en la base de datos en la columna id
                -->
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['fn'];?></td>
                    <td><?php echo $row['ln'];?></td>

                    <!--para indicar el enlace para eliminar o editar 
                    enviamos por get la variable del, que va a ser igual a una data
                    que se esta pasando de forma dinamica por php 
                    -->
                    <td><a href="?edit=<?php echo $row['id']?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
                    <td><a href="?del=<?php echo $row['id']?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>
                </tr>
                        
                <?php
              }

              ?>
          </table>


        </div>
    </center>  
</body>
</html>
