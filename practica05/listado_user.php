<?php

include_once('db/database_utilities.php');

//$id_type = $_GET["tipo"]; //Se obtiene l variable por el método get


$user_access = getAll_user(); //Se obtienen todos los registros y se llena el array mediante los usuarios encontrados en la base de datos.
$total_users = count($user_access); //Se hace un conteo de cuantos registros se tinen en el sistema.
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> CRUD Práctica 6</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Listado de usuarios <h3>
          <p></p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Email</th>
                    <th width="250">Status</th>
                    <th width="250">Tipo de usuario</th>                    
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    // Ciclo para listar todos los jugadores                  
                   ?>
                  <?php foreach( $user_access as $id => $user ){ ?>
                  <tr>
                    <?php 
                      $tipo = $user['user_type_id'];
                      if($tipo == 2) { $tipo = "<b>administrador</b>"; }
                      else { $tipo = "Normal"; }
                     ?>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['status_id'] ?></td>
                    <td><?php echo $tipo ?></td>                    
                    <?//Se generan dos botones, que redireccionan a acutalizaar y eliminar respectivamente."?>
                    
                    <?php //Solo el administrador puede modificar usuarios normles ?>
                    <?php if($user['user_type_id'] == 1) {?>

                    <td><a href="./update_user.php?id=<?php echo($user['id']); ?>" class="button radius tiny warning"">Modificar</a></td>

                    <td><a href="./delete_user.php?id=<?php echo($user['id']); ?>" class="button radius tiny alert" onClick="wait();">Eliminar</a></td>

                    <?php } ?>


                    
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>

    </div>


    <script type="text/javascript">
        //Funcion que permite cancelar el evento en caso de querer borrar un archivo.
        function wait(){
          var r = confirm("¿Desea eliminar el usuario?");
          if (!r) 
              event.preventDefault();
        }
    </script>

    <?php require_once('footer.php'); ?>

