<?php

date_default_timezone_set("America/Bogota");

$vacio=0; //variable auxiliar 

$prueba=$_POST["tecnicos"];//Obtenemos la lista de tecnicos a añadir




        if($prueba[0]!=null ||$prueba[1]!=null ){// verifiacamos que la lista no esta vacia 




                    for( $i=0;$i<count($prueba);$i++){//recorremos la lista 

                                $tec=null;
                                $tec = new AddTecnicoData();//creamos un objeto de la clase "añadir tecnico "

                                if($prueba[$i]){
                                    $tecnico= TecnicoData::getById($prueba[$i]);// como tenemos 2 campos, traemos el id del tecnico en de ambos selectores
                                    $tecnico->estado=1; //estado uno para ocupado
                                    $tecnico->updateEstado(); //actualizamos el estado
                                }
                          

                                $tec->id_tecnico=$prueba[$i];//añadimos el id que se trae como parametro de la lista "frontEnd"
                            
                                $tec->id_diag= $_POST["id_diag"];// id del diagnostico al que se asociará el tecnico
                        

                                $var=  $tec->add();//ejecutamos el metodo para añadir el tecnico a un diagnostico 

                    }
                        
        }else{
                        $vacio=1;// variable auxiliar en 1 para saber si estaba vacio los campos 
        }
   

                    

               if($vacio==0){

                include("core/app/action/AddTecnico/AddEjecucion-action.php");
                       
                        core::alert("Añadido con exito");// alerta de confirmacion
                        print "<script>window.location='index.php?view=TecDiag/View_Tecnicos_Diag';</script>";//redireccion 

                    }else{
                        core::alert("No fue Añadido con exito");// alerta de confirmacion
                        print "<script>window.location='index.php?view=TecDiag/View_Tecnicos_Diag';</script>";//redireccion 


                    }


?>