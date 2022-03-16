<?php

use LDAP\Result;

require('head.php');
require_once('navbar_m.php');
?>

<?php
$a_checkout = json_decode(file_get_contents('../Config/checkout.json'), true);
if(isset($_POST["in_checkout"])){
$nombre = $_POST["in_nombre"];
$apellido = $_POST["in_apellido"];
$email = $_POST["in_mail"];
$tel = $_POST["in_tel"];
$localidad = $_POST["in_localidad"];
$ciudad = $_POST["in_ciudad"];

$direccion = $_POST["in_direccion"];
$banco = $_POST["in_banco"];
$tarjeta = $_POST["in_tarjeta"];
$expiracion = $_POST["in_expiracion"];
$seguridad = $_POST["in_seguridad"];
$dni = $_POST["in_dni"];


$comentario = $_POST["in_comentario"];
array_push($a_checkout, array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'telefono' => $tel,
    'localidad' => $localidad,
    'ciudad' => $ciudad,
    'comentario' => $comentario,

    'direccion' => $direccion,
    'banco' => $banco,
    'tarjeta' => $tarjeta,
    'expiracion' => $expiracion,
    'seguridad' => $seguridad,
    'dni' => $dni,

));
// ahora pisamos el producto y lo metemos en el json 
file_put_contents('../Config/checkout.json', json_encode($a_checkout));




?>
    <!-- Alerta de mensaje enviado-->
    <div class="mt-5 pt-5">
        <div class="alert alert-success alert-dismissible fade show mt-2 " role="alert" id="success-alert">
            <strong>Hola <?php echo $nombre ?> <br>
            </strong>tú pedido fue guardado en la base de datos <br>
            </strong> y llegara a tu domicilio a la brevedad. <br>

           
        </div>
    </div>
    <!-- fin de alerta de mensaje enviado-->
<?php
}





$carro = json_decode(file_get_contents('../Config/pcarrito.json'), true);


int:$cant=0; $precioT=0;
?>
<div class="row">
<div class="col-10 col-md-10 col-lg-4">
<table class='table table-bordered cuadro1'>
<thead>
    <tr>
        <th scope='col'>id</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Precio</th>
        <th scope='col'>Cantidad</th>
    </tr>
</thead>
<tbody>
<?php
foreach($carro as $carrito){
    $c_id = $carrito['id_p'];
    $c_nom = $carrito['nombre'];
    $c_pre = $carrito['precio'];
    $c_cant = $carrito['cantidad'];
    $cant = $cant + $c_cant;
    $precioT = $precioT + $c_pre;
    array_push($carro, array(
        'id' => $c_id,
        'nombre' => $c_nom,
        'precio' => $c_pre,
        'cantidad' => $c_cant,
    ));
    // ahora pisamos el producto y lo metemos en el json 
    file_put_contents('../Config/pedidos.json', json_encode($carro));

   // $c_img = "../Assets/img/id-" . $c_id . ".jpg";

//<!--<img src='<?php // echo  $c_img ' class='card-img-top rounded' alt='...'>-->
   echo '
<tr class="">
            <td>
                <p class="card-text">' . $c_id . '</p>
            </td>
            <td>
                <p class="card-text">' . $c_nom . '</p>
            </td>
            <td>
                <p class="card-text">' . $c_pre . '</p>
            </td>
            <td>
                <p class="card-text">' . $c_cant . '</p>
            </td>
            ';
            
            } 
            
            
            ?>
                                 </tr>
                              </tbody>
                          </table>
                          <div class="">
                              <h3 class="h5 cuadro2"><?php echo "Total de productos: ".$cant; ?></h3>
                              <h3 class="h5 cuadro2"><?php echo "Precio Total: ".$precioT; ?></h3>
                          </div>
                          <?php


?>
</div>



<div class="col-10 col-md-10 col-lg-8 p-5">
<h1 class="Checkout">Checkout</h1>
<form action="Checkout.php" method=post>
            
            <div class="row">
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault01" class="form-label"></label>
                    <p> <input type="text" name="in_nombre" class="form-control" placeholder="Nombre" id="validationDefault01" value="" required ></input> <?php ?></p>
                </div>

                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault02" class="form-label"></label>
                    <p> <input type="text" name="in_apellido" class="form-control" placeholder="Apellido" value="" id="validationDefault02"  required></input></p>
                </div>

            </div>
            <div class="row">


                <div class="form-group col-10 col-md-5 col-lg-6">
                <label  id="inputGroupPrepend2" class="form-label"></label>
                    <p> <input type=email name=in_mail class=form-control placeholder=Email value="" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required></input></p>
                </div>



                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault05" class="form-label"></label>
                    <p> <input type=number name=in_tel class=form-control placeholder=Telefono value="" id="validationDefault05" required></input></p>
                </div>

            </div>

            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault03" class="form-label"></label>
                    <p> <input type=text name=in_localidad class=form-control placeholder=Localidad value="" id="validationDefault03" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault04" class="form-label"></label>
                    <p> <input type=text name=in_ciudad class=form-control placeholder=Ciudad value="" id="validationDefault04" required></input></p>
                </div>
            </div>

            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault07" class="form-label"></label>
                    <p> <input type=text name=in_direccion class=form-control placeholder=Dirección value="" id="validationDefault07" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault08" class="form-label"></label>
                    <p> <input type=text name=in_banco class=form-control placeholder=Banco value="" id="validationDefault08" required></input></p>
                </div>
            </div>



            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault09" class="form-label"></label>
                    <p> <input type=number name=in_tarjeta class=form-control placeholder="Número de Tarjeta" value="" id="validationDefault09" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault10" class="form-label"></label>
                    <p> <input type=date name=in_expiracion class=form-control placeholder="Fecha de Expiración" value="" id="validationDefault10" required></input></p>
                </div>
            </div>
            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault11" class="form-label"></label>
                    <p> <input type=password name=in_seguridad class=form-control placeholder="Código de seguridad" value="" id="validationDefault11" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault12" class="form-label"></label>
                    <p> <input type=number name=in_dni class=form-control placeholder="DNI del Titular" value="" id="validationDefault12" required></input></p>
                </div>
            </div>

            <div class="form-group col-7 col-md-9 col-lg-12">
            <label for="validationDefault06" class="form-label"></label>
                <p><textarea class=form-control id=exampleFormControlTextarea1 name=in_comentario placeholder="Si tenes algún comentario" rows=3 value=""  id="validationDefault06" required></textarea></p>

            </div>

            <div class="form-group col-8 col-md-10 col-lg-12 ">
                <a href="../index.php">
                <input type=submit class="btn botonenviar" name=in_checkout>
                <?php
                $carrito = [];
  file_put_contents('../Config/pcarrito.json', json_encode($carrito));
  ?>
                </a>
            </div>
        </form>

</div>
</div>
<?php

require_once("footer_m.php");
require_once("scripts.php");
?>