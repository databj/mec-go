<?php



$user = ProcesoData::getById($_POST["id"]);//CREAMOS EL OBJETO DEL CUAL SE LLAMARA EL METODO PARA ELIMINAR 

$diag =  DiagnosticoData::getByIdProceso($user->id);   
$img= ImageData::getImgAll($user->id);
$cotizacion=CotizacionData::getByIdProceso($user->id);


       foreach($img as $img):
                 $img->del();
        endforeach;
        

        foreach($diag as $diag):
            $tecnico=AddTecnicoData::getByDiag($diag->id);
                        
                foreach($tecnico as $tecnico){
                            
                    $tecnico->del();
                }

            $ejecucion=EjecucionData::getByIdDiag($diag->id);
                if($ejecucion!=null){
                   
                       

                         $ejecucion->id;
                              $notificacion=NotificacionData::getById($ejecucion->id);
                              
                                if($notificacion!=null){
                                   $notificacion->del();
                                }

                                $pendiente=PendienteData::getByIdEjec($ejecucion->id);
                                foreach($pendiente as $pendiente):
                                    $pendiente->del();
                                endforeach;
                         
                         
                                $ejecucion->del();

                       
                        
                        
                   
                }


                $diag->del();


               /* $mas_tec= AddTecnicoData::getByDiag($diag->id);

                        foreach($mas_tec as $mas_tec):
                        
                            $mas_tec->del();
                            
                        endforeach;*/


        

        endforeach;

            foreach($cotizacion as $cotizacion):
                $cotizacion->del();
            endforeach;



            $var= $user->delById($_POST["id"]);//METODO DEL OBJETO DE LA CLASE TECNICO PARA ELIMINAR PASANDO COMO PARAMETRO EL ID QUE SE TRAE DESDE LA VISTA 

            if($var[0]==1){
                core::alert("eliminado con exito"); //MENSAJE DE CONFIRMACION

                if($_POST["view"]=="Proceso/View_Proceso_Finalizado"){
                 
                    print "<script>window.location='index.php?view=Proceso/View_Proceso_Finalizado';</script>";//NOS LLEVA AL INICIO
                
                }

                if($_POST["view"]=="Proceso/View_Procesos_All"){
                    print "<script>window.location='index.php?view=Proceso/View_Procesos_All';</script>";//NOS LLEVA AL INICIO
                
                }

                if($_POST["view"]=="Proceso/View_Procesos_General"){
                    print "<script>window.location='index.php?view=Proceso/View_Procesos_General';</script>";//NOS LLEVA AL INICIO
                
                }

                
                if($_POST["view"]=="Proceso/View_Procesos"){
                    print "<script>window.location='index.php?view=Proceso/View_Procesos';</script>";//NOS LLEVA AL INICIO
                
                }
                
                    print "<script>window.location='index.php?view=Card';</script>";//NOS LLEVA AL INICIO
                
            }else{
                core::alert("no pudo se elminado con exito"); //MENSAJE DE CONFIRMACION
                    print "<script>window.location='index.php?view=Card';</script>";//NOS LLEVA AL INICIO
                
            }


?>