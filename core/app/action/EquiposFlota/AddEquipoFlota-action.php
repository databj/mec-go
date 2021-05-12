<?php

// es necesario y obligatorio un id de la empresa y el id del equipo que se referecia a la flota que se esta creando 
//este PHP ejecuta el codigo para recibir los parametros de la vista y ejecutar el metodo de la clase Flota 
        $flota = new EquiposFlotaData();

      echo  $flota->id_flota=$_POST["id"];

     echo   $flota->id_equipo = $_POST["id_equipo"];
    
    
        $equipo=EquiposFlotaData::getByIdEquipo($_POST["id_equipo"]);
        
        
        
          if($equipo==null){

              $flota->add();//metodo de la clase Flota para añadir a la BD
               core::alert("Añadido con exito");//mensaje de confirmacion
               print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
          

          }else{
               core::alert("Exites un Equipo con esta placa en su flota ");//mensaje de confirmacion
               print "<script>window.location='index.php?view=Card';</script>";//redireccion al index

               

          }
   




    
?>