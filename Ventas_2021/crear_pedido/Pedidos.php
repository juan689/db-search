<?php
  
  $host = "localhost";
  $dbname = "venta_2021";
  $username = "root";
  $password = "";

  $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  
  $sql = "SELECT cliente_id, nombre FROM clientes";
  $q = $cnx->prepare($sql);
  $result = $q->execute();
  $clientes = $q->fetchAll();

  $sql = "SELECT articulo_id, descripcion, precio FROM articulo";
  $q = $cnx->prepare($sql);
  $result = $q->execute();
  $articulo = $q->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="StylePedidos.css" type ="text/css">
    <title> Ingresar Pedido </title>
</head>
<body background="fondo.jpg">
        <h1>
             FORMULARIO LICORERA 
        </h1>
      
      <form action="Guardar-pedidos.php">
      
        Cliente
        <select name="clientes" id="">
      
        <?php

        for($i=0; $i<count($clientes); $i++){
       ?>
       
          <option value="<?php echo $clientes[$i]["cliente_id"] ?>">

          <?php echo $clientes[$i]["nombre"] ?>

          </option>
      <?php
        } 
     ?>
        </select>

        <br>
        <br>

        Articulo
        <select name="articulo" id="">
      
        <?php

        for($i=0; $i<count($articulo); $i++){
       ?>
       
          <option value="<?php echo $articulo[$i]["articulo_id"] ?>">

          <?php echo $articulo[$i]["descripcion"]." $ ".$articulo[$i]["precio"] ?>

          </option>
      <?php
        } 
     ?>
        </select>

        <br>
        <br>

        <label for="unidades">Cuantas unidades quieres ?</label>
        <input type="number" id="unidades" name="unidades">

        <br>
        <br>

      <input type="submit"value="Crear pedido">

      <hr>
    <a href="http://localhost/pro4/licorera/"> Ir al inicio </a>

      </form>

      <br>
    <footer class = "footer">
        <h1>Licores La 19 Manizales</h1>
        <h2>Carrera 14 numero 13-06
            Cel. 3207041490
        </h2>
        <p>Todos los dias de 18:00 a las 00:00 pm 
        LEY 124 ARTICULO 1° Prohíbase el expendio de bebidas embriagantes a menores de edad.
        </p>
        <br>
        <br>

        <img src="imagen1.jpg"/>
            
</body>
</html>




