<?php


//CREAMOS UN OBJETO DE LA CLASE TECNICO 
        $user = new TecnicoData();

//AÑADIMOS LOS PARAMETROS DEL POST A LOS ATRIBUTOS DEL OBJETO 
        $user->nombre=$_POST["nombre"];
        $user->cc = $_POST["cedula"];
        $user->especialidad_1= $_POST["especialidad_1"];
	$user->especialidad_2 =$_POST["especialidad_2"];
		
      //  $val=TecnicoData::getByIdCC($_POST["cedula"]);
 // $user->add();//EJECUTAMOS EL METODO PARA AÑADIR A LA BD
  

        $var=$user->add();//EJECUTAMOS EL METODO PARA AÑADIR A LA BD
   
                if($var[0]==1){

                        core::alert("Añadido con exito");//mensaje de confirmacion
                        print "<script>window.location='index.php?view=Tecnico/View_Tecnico';</script>";//redireccion al index
                }else{
                        core::alert("Error Al Añadir");//mensaje de confirmacion
                        print "<script>window.location='index.php?view=Tecnico/View_Tecnico';</script>";//redireccion al index

                }


?>