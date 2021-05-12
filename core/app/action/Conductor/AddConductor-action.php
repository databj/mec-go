<?php




                //creamos un objeto de la clase Conductor para poder pasa los parametros que vienen de la vista 
                $Conductor = new ConductorData();
                //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 
                
                $Conductor->nombre=$_POST["nombre"];
                $Conductor->cc = $_POST["cedula"];
                $Conductor->contacto= $_POST["telefono"];
                $Conductor->email= $_POST["email"];
                $Conductor->tipo ="NATURAL";

                $confirmacion=ConductorData::getByIdCC($Conductor->cc);

        
                if( $confirmacion!=null){
                        core::alert("Existe un conductor con este # CC"); //enviamos mensaje de Exito
                        print "<script>window.location='index.php?view=Conductor/View_Conductor';</script>";//redireccionamos a la pagina principal

                }else{
                        $Conductor->add();//llamamamos al metodo de la clase "Cliente" para ejecutar el Sql que envia a la BD 
                                core::alert("Añadido con exito"); //enviamos mensaje de Exito
                                print "<script>window.location='index.php?view=Conductor/View_Conductor';</script>";//redireccionamos a la pagina principal

                        
                }


//core::alert("Añadido con exito"); //enviamos mensaje de Exito
//print "<script>window.location='index.php?view=View_Conductor';</script>";//redireccionamos a la pagina principal

?>