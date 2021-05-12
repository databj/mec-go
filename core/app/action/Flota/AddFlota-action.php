<?php

// es necesario y obligatorio un id de la empresa y el id del equipo que se referecia a la flota que se esta creando 
//este PHP ejecuta el codigo para recibir los parametros de la vista y ejecutar el metodo de la clase Flota 
   $Flota = new FlotaData();

   $Flota->nombre=$_POST["nombre"];
   $Flota->id_empresa= $_POST["id_empresa"];
   // $Flota->id_equipo = $_POST["id_equipo"];

  
        
		

  $var=$Flota->add();//metodo de la clase Flota para añadir a la BD
   
    if($var[0]==1){
      core::alert("Añadido con exito");//mensaje de confirmacion
      if($_POST["View"]=="Empresa/Flota/Add_Flota"){
      print "<script>window.location='index.php?view=Empresa/Flota/View_Flota';</script>";//redireccion al index
    
      }

      if($_POST["View"]=="Add_Flota"){
      print "<script>window.location='index.php?view=Flota/View_Flota';</script>";//redireccion al index
     
      }else{
      print "<script>window.location='index.php?';</script>";//redireccion al index
      
      }
      



    // 
    }else{
      core::alert("Error al Añadir");//mensaje de confirmacion

      if($_POST["view"]=="Empresa/Flota/Add_Flota"){
        print "<script>window.location='index.php?view=Empresa/Flota/View_Flota';</script>";//redireccion al index

      }

      if($_POST["view"]=="Add_Flota"){
        print "<script>window.location='index.php?view=Flota/View_Flota';</script>";//redireccion al index

      }else{
        print "<script>window.location='index.php?';</script>";//redireccion al index

      }

    }




     
?>