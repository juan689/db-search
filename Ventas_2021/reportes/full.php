<?php
 
  $nombre_cliente;
  $where = '';
  if(isset($_REQUEST['nombre_cliente'])){
      $nombre_cliente = $_REQUEST['nombre_cliente'];
      if($nombre_cliente != ""){
      $where = "WHERE c.nombre = '$nombre_cliente'";
         }
    
      }
      
  $nombre_precios;
  if(isset($_REQUEST['nombre_precios'])){
      $nombre_precios = $_REQUEST['nombre_precios'];
      if($nombre_precios != ""){
          if($where == ""){
      $where = "WHERE a.precio = '$nombre_precios'";
         }
         else{
             $where = "$where OR a.descripcion = '$nombre_precios'";
         }
        }
      }

  $nombre_descripcion;
  if(isset($_REQUEST['nombre_descripcion'])){
      $nombre_descripcion = $_REQUEST['nombre_descripcion'];
      if($nombre_descripcion != ""){
          if($where == ""){
      $where = "WHERE a.descripcion = '$nombre_descripcion'";
         }
         else{
             $where = "$where OR a.descripcion = '$nombre_descripcion'";
         }
        }
      }

  $host = "localhost";
  $dbname = "venta_2021";
  $username = "root";
  $password = "";

  $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

  $sql = "SELECT c.nombre, c.telefono, a.descripcion, a.iva, a.precio FROM clientes as c 
  JOIN pedidos p ON c.cliente_id = p.cliente_id JOIN articulo a ON p.articulo_id = a.articulo_id $where ORDER BY c.nombre ASC";
  
  $q = $cnx->prepare($sql);
  $result = $q->execute();


  $sqlnombres = "SELECT nombre FROM clientes";
  $cl = $cnx->prepare($sqlnombres);
  $resultnombres = $cl->execute();

  $sqlprecios = "SELECT precio FROM articulo";
  $artt = $cnx->prepare($sqlprecios);
  $resultprecios = $artt->execute();

  $sqldescripcion = "SELECT descripcion FROM articulo";
  $art = $cnx->prepare($sqldescripcion);
  $resultdescripcion = $art->execute();

  $relacion = $q->fetchAll();
  $nombre_cliente = $cl->fetchAll();
  $nombre_descripcion = $art->fetchAll();
  $nombre_precios = $artt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" type ="text/css">
  <title>Relacion list</title>
</head>
<body background="fondo.jpg">
<body>

    <form action="full.php">
     <select name = "nombre_cliente"> 

     <option value=" " >Clientes</option>
     
     <?php

        for($i=0; $i<count($nombre_cliente); $i++){
       ?>
       
          <option value="<?php echo $nombre_cliente[$i]["nombre"] ?>">

          <?php echo $nombre_cliente[$i]["nombre"] ?>

          </option>
      <?php
        } 
     ?>
     </select>
     <br>
     <br>

     <select name = "nombre_precios"> 

     <option value=" " >Precios</option>
     
     <?php

        for($i=0; $i<count($nombre_precios); $i++){
       ?>
       
          <option value="<?php echo $nombre_precios[$i]["precio"] ?>">

          <?php echo $nombre_precios[$i]["precio"] ?>

          </option>
      <?php
        } 
     ?>
     </select>
     <br>
     <br>


     <select name = "nombre_descripcion"> 
     <option value=" " >Productos</option>
     <?php

        for($i=0; $i<count($nombre_descripcion); $i++){
       ?>
       
          <option value="<?php echo $nombre_descripcion[$i]["descripcion"] ?>">

          <?php echo $nombre_descripcion[$i]["descripcion"] ?>

          </option>
      <?php
        } 
     ?>
     </select>
     <br>
     <br>


     <input type="submit" value="Search OR"/>

     <input type="submit" value="Search AND"/>
     <hr/>

     <a href="http://localhost/pro4/licorera/"> Ir al inicio </a>
    
    </form>
    
    <h1>LISTA CLIENTES LICORERA LA 19</h1>

    <h2>
    <table border="1">
        
    <h3>
        <tr>
        
           <td>
               NOMBRE DEL CLIENTE
           </td>

           <td>
               TELEFONO
           </td>


           <td>
               DESCRIPCION DEL PRODUCTO
           </td>

           <td>
               IVA
           </td>

           <td>
               PRECIO
           </td>

        </tr>

    </h3>
<?php
        for($i=0; $i<count($relacion); $i++)  {
?>
        <tr>
           <td>
               <?php echo $relacion[$i]["nombre"] ?>
           </td>

           <td>
               <?php echo $relacion[$i]["telefono"] ?>
           </td>

           <td>
                <?php echo $relacion[$i]["descripcion"] ?>
           </td>

           <td>
               <?php echo $relacion[$i]["iva"] ?>
           </td>

           <td>
               <?php echo $relacion[$i]["precio"] ?>
           </td>
       
        </tr>

        </h2>
<?php

      }

?>


    </table>
  
</body>
</html>