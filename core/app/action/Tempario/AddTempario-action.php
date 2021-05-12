<?php




        //creamos un objeto de la clase Conductor para poder pasa los parametros que vienen de la vista 
        $tempario = new TemparioData();
              //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 
              
         $tempario->descripcion=$_POST["nombre"];
                $confirmacion=$tempario->add();

        //
        if( $confirmacion[1]!=null){
                core::alert("Añadido con exito"); //enviamos mensaje de Exito
                print "<script>window.location='index.php?view=Card';</script>";//redireccionamos a la pagina principal

        }else{
        
                        core::alert("Error al añadir Item al tempario"); //enviamos mensaje de Exito
                        print "<script>window.location='index.php?view=Card';</script>";//redireccionamos a la pagina principal

                
        }


//core::alert("Añadido con exito"); //enviamos mensaje de Exito
//print "<script>window.location='index.php?view=View_Conductor';</script>";//redireccionamos a la pagina principal

?>