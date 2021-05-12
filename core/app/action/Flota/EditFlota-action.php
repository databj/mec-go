<?php

// es necesario y obligatorio un id de la empresa y el id del equipo que se referecia a la flota que se esta creando 
//este PHP ejecuta el codigo para recibir los parametros de la vista y ejecutar el metodo de la clase Flota 
   $user = new FlotaData();
   $user->id=$_POST["id"];
   $user->nombre=$_POST["nombre"];
   $user->id_empresa= $_POST["id_empresa"];


       
        
		

     $user->update();//metodo de la clase Flota para actualizar a la BD
   





    core::alert("Añadido con exito");//mensaje de confirmacion
 


    if($_POST["View"]=="Empresa/Flota/Edit_Flota"){
      print "<script>window.location='index.php?view=Empresa/Flota/View_Flota';</script>";//redireccion al index
    
      }

      if($_POST["View"]=="Edit_Flota"){
      print "<script>window.location='index.php?view=Flota/View_Flota';</script>";//redireccion al index
     
      }else{
      print "<script>window.location='index.php?';</script>";//redireccion al index
      
      }
      



?>