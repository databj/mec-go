<?php



    $user = EmpresaData::getById($_POST["id"]);//LLAMAMOS AL CONSTRUCTOR PARA CREAR EL OBJETO DE LA CLASE "Empresa"


   //PASAMOS LOS PARAMETROS DE CADA UNO DE LOS POST QUE SE TRAEN DESDE LA VISTA 


   $user->nombre=$_POST["nombre"];


     $var=$user->update();//metodo de la clase Empresa para actualizar datos a la BD
   

        if($var[0]==1){
            core::alert("Editado con exito");//mensaje de confirmacion
            print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
            
        }else{
            core::alert("Error al editar");//mensaje de confirmacion
             print "<script>window.location='index.php?view=Card';</script>";//redireccion al index

        }


?>