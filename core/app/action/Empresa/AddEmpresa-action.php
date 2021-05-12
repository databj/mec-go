<?php

//tenemos 2 para evaluar 

// juridijo y Natural, en caso de que sea juridico se crea el objeto empresa, pero solo llenamos el campo de id_dueno haciendo referencia que es un cliente 
//en caso de que sea natural, se asume que es un conductor y solo se añade el id al campo de id_dueno_conductor 
   $user = new EmpresaData();

      if($_POST["tipo"]=="Juridico"){
      
         $user->nombre=$_POST["nombre"];
         $user->id_dueno = $_POST["id_dueno"];
         $confirmacion=EmpresaData::getByNit($user->id_dueno);
      }else{
         $user->nombre=$_POST["nombre"];
         $user->id_dueno_conductor = $_POST["id_dueno"];
         $confirmacion=EmpresaData::getByCC($user->id_dueno_conductor);
      }

         if($confirmacion!= null){
            core::alert("YA EXISTE UNA EMPRESA CON ESTE NIT/CC");// alerta de confirmacion
            print "<script>window.location='index.php?view=Empresas/View_Empresa';</script>";//redireccion al inicio
         }else{
            $user->add();//metodo de la clase Empresa para Enviar a la BD
            core::alert("Añadido con exito");// alerta de confirmacion
            print "<script>window.location='index.php?view=Empresas/View_Empresa';</script>";//redireccion al inicio

         }

       
        
		

 //    $user->add();//metodo de la clase Empresa para Enviar a la BD
   



//core::alert("Añadido con exito");// alerta de confirmacion
//print "<script>window.location='index.php?view=View_Empresa';</script>";//redireccion al inicio

?>