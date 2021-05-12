<?php



$user =  ConductorData::getById($_POST["id"]);//LLAMAMOS AL CONSTRUCTOR PARA CREAR EL OBJETO DE LA CLASE "CONDUCTOR"


//PASAMOS LOS PARAMETROS DE CADA UNO DE LOS POST QUE SE TRAEN DESDE LA VISTA 
$user->id=$_POST["id"];
$user->nombre=$_POST["nombre"];
$user->cc = $_POST["cedula"];
$user->contacto= $_POST["telefono"];
//$user->tipo =$_POST["tipo"];

$var= $user->update();//LLAMAMOS AL METODO QUE HACE LA ACTUALIZACION DE LOS DATOS 


        if($var[0]==1){
            core::alert("Actualizado con exito");//mensaje de confirmacion
            print "<script>window.location='index.php?view=Card';</script>";//redireccion al index


        }else{
            core::alert("Error al Actualizar los datos");//mensaje de confirmacion
            print "<script>window.location='index.php?view=Card';</script>";//redireccion al index


        }


?>