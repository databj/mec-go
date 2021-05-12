<?php



        $user = new TecnicoData();//LLAMAMOS AL CONSTRUCTOR PARA CREAR EL OBJETO DE LA CLASE "TECNICO"


        //PASAMOS LOS PARAMETROS DE CADA UNO DE LOS POST QUE SE TRAEN DESDE LA VISTA 
        $user->id=$_POST["id"];
        $user->nombre=$_POST["nombre"];
        $user->cc = $_POST["cedula"];
        $user->especialidad_1= $_POST["especialidad_1"];
        $user->especialidad_2 =$_POST["especialidad_2"];


      $var=  $user->update();//LLAMAMOS AL METODO QUE HACE LA ACTUALIZACION DE LOS DATOS 



            if($var[0]==1){
                core::alert("Editado con exito");//mensaje de confirmacion
                print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
            }else{
                
                core::alert("Error al editar ");//mensaje de confirmacion
                print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
            }

?>