<?php



$user = EquipoData::getById($_POST["id"]);//LLAMAMOS AL CONSTRUCTOR PARA CREAR EL OBJETO DE LA CLASE "EQUIPO"


//PASAMOS LOS PARAMETROS DE CADA UNO DE LOS POST QUE SE TRAEN DESDE LA VISTA 

$user->tipo=$_POST["tipo"];
$user->placa = $_POST["placa"];

$var=$user->update();//LLAMAMOS AL METODO QUE HACE LA ACTUALIZACION 

        if($var[0]==1){
            core::alert("Editado con exito");//mensaje de confirmacion
            print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
            
        }else{
            core::alert("Error al editar");//mensaje de confirmacion
            print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
            
        }


?>