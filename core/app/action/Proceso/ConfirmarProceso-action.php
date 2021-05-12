<?php

date_default_timezone_set("America/Bogota");

//$user = new ProcesoData();
/*
echo $user->id_user=$_SESSION["user_id"]."<br />";  
echo $user->id_equipo = $_POST["placa"]."<br />";
echo $user->kilometraje= $_POST["kilometraje"]."<br />";
echo $user->tipo_trabajo =$_POST["tipo"]."<br />";
echo $user->id_conductor =$_POST["conductor"]."<br />";
echo $user->id_empresa =$_POST["empresa"]."<br />";
echo $user->tipo_pago =$_POST["tipo_pago"]."<br />";
echo $user->garantia =$_POST["garantia"]."<br />";
*/

//creamos un objeto de la clase Cliente para poder pasa los parametros que vienen de la vista 
        $user =ProcesoData::getById($_POST["id"]);

        //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 

       $user->estado="CONFIRMADO";  
    
        
 
      $user->update();//llamamamos al metodo de la clase "Proceso" para ejecutar el Sql que envia a la BD 

            if($_POST["view"]=="Proceso/View_Procesos"){
                        
                  core::alert("Añadido con exito");//mensaje de confirmacion
                  print "<script>window.location='index.php?view=Proceso/View_Procesos';</script>";//redireccion al index
                  
            }

            if($_POST["view"]=="Proceso/View_Procesos_All"){
                  
                  core::alert("Añadido con exito");//mensaje de confirmacion
                  print "<script>window.location='index.php?view=Proceso/View_Procesos_All';</script>";//redireccion al index
                  
            }else{

                        core::alert("Añadido con exito");//mensaje de confirmacion
                        print "<script>window.location='index.php?view=Proceso/View_Procesos_General';</script>";//redireccion al index
            }

?>