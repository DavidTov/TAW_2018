<?php
  require_once("db/database_utilities.php");
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 06 |  Ejercicio 1</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php //Se incluye el header con el botón de inicio de sesión ?>
    <?php require_once('header_btn_sesion.html'); ?>


    <div class="row">
      <div class="large-9 columns">
        <h3>Ejercicio 1</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <table>
                <thead>
                  <th>
                    Usuarios
                  </th>
                  <th>
                    Tipos
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Accesos
                  </th>
                  <th>
                    Usuarios Activos
                  </th>
                  <th>
                    Usuarios Inactivos
                  </th>
                </thead>
                <tr>
                  <td>                 
                    <?php echo(count_users()) //Cuenta los usuarios?> 
                  </td>
                  <td>
                    <?php echo(count_types()) //Cuenta los tipos?>
                  </td>
                  <td>
                    <?php echo(count_status()) //Cuenta los status?>
                  </td>
                  <td>
                    <?php echo(count_access()) //Cuenta los logs?>
                  </td>
                  <td>
                    <?php echo(count_active()) //Cuenta los usuarios activos?>
                  </td>
                  <td>
                    <?php echo(count_inactive()) //Cuenta los inactivos?>
                  </td>
                </tr>
              </table>
         	</div>

          <?php 
          //Nombre de las tablas
          $tables=["status","user","user_log","user_type"];
          //Columnas de las tablas
          $cols=[["id","name"],["id","email","password","status_id","user_type_id"],["id","date_logged_in","user_id"],["id","name"]];
          //NUmero de tablas
          $count=0;

          foreach($tables as $t){
            $r = selectAllFromTable($t);
            //echo "<br>" . count($r) . "<br>";
            echo("Tabla: ".$t);
          ?>
            <table>
              <thead>
                <?php 
                  //Se imprime la cabecera de las tablas
                  for($i=0; $i<count($cols[$count]); $i++){
                    echo("<th>".$cols[$count][$i]."</th>");
                  }
                ?>
              </thead>
              <tbody>
                <?php
                  //Se imprimen las filas y columnas
                  for($i=0; $i<count($r);$i++){
                    echo("<tr>");
                    
                    for($j=0; $j<count($cols[$count]); $j++){                      
                      echo("<td>".$r[$i][$j]."</td>");
                    }
                    echo("</tr>");
                  }
                ?>
              </tbody>
            </table>
          <?php
          $count++;
          }
          ?>
          </section>
        </div>
      </div>
    </div>

    <?php require_once('footer.php'); ?>
