
     <!-- Badges Alerts Start -->
                     <!--================================-->							
                     <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-40">
                           <div class="card-header">
                              <h4 class="card-header-title">
                               <center> Historial De Trabajos
                              </h4>
                              
                           </div>
                           
                           <div class="card-body collapse show" id="collapse1">
                                <div id="accordion">
                                        <?php 
                                            $diagnostico=DiagnosticoData::getByIdProceso($_POST["id"]);
                                            $proceso=ProcesoData::getById($_POST["id"]);
                                            $i=0;
                                            foreach ($diagnostico as $key => $diagnostico) {
                                              
                                                
                                                $placa=EquipoData::getById($proceso->id_equipo);
                                                $Tempario=TemparioData::getById($diagnostico->tipo_diagnostico);

                                                $historial=HistorialData::getByIdDiag($diagnostico->id);
                                                $contadorBien=HistorialData::contadorBien($diagnostico->id);
                                                $contadorUrgente=HistorialData::contadorUrgente($diagnostico->id);
                                                $contadorPronto=HistorialData::contadorPronto($diagnostico->id);
                                               
                                        ?>
                                        
                                                    <div class="alert alert-primary fade show" role="alert">
                                                        <?php echo $diagnostico->id."   ".$placa->placa." - ".$Tempario->descripcion; ?>
                                            
                                                        <button  class="badge badge-success pull-right" data-toggle="collapse" href="<?php echo "#accordionBien".$i;?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><?php echo $contadorBien->total;?> BIEN</button>  
                                                        <button  class="badge badge-warning pull-right" data-toggle="collapse" href="<?php echo "#accordionPronto".$i;?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><?php echo $contadorPronto->total;?> PRONTO</button>  
                                                        <button  class="badge badge-danger pull-right" data-toggle="collapse" href="<?php echo "#accordionUrgente".$i;?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><?php echo $contadorUrgente->total;?> URGENTE</button>  

                                                       
                                                    </div>


                                               
                                               
                                              
                                                    <div id="<?php echo "accordionBien".$i;?>" class="collapse" data-parent="#accordion">
                                                        
                                                            
                                                                    <?php
                                                                    if($historial!=null): //if historial

                                                                    
                                                                    foreach ($historial as $key => $historial) : //foreach historial
                                                                        
                                                                        if($historial->estado==1): //if de tipo de historial

                                                                        
                                                                
                                                                    ?>
                                                                
                                                                    
                                                                                    <div class="card-body collapse show">
                                                                                        <div class="activity" >

                                                                                            <i class="icon-check bg-soft-primary" ></i>
                                                                                            <div class="time-item">
                                                                                                <div class="item-info ">
                                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                                        <h6 class="tx-dark tx-13 mb-0"><?php echo $historial->descripcion;?></h6>
                                                                                                        <span class="small"><?php echo $historial->fecha ;?></span>
                                                                                                    </div>
                                                                                                    <p class="mt-2 tx-12"><?php echo $historial->descripcion;?></p>
                                                                                                    
                                                                                                    
                                                                                                    <div class="col-md-12 col-lg-8 col-xl-9" >
                                                                                                    

                                                                                                        <span class="badge bg-soft-primary tx-uppercase">Design</span> 
                                                                                                        <span class="badge bg-soft-danger  tx-uppercase">URGENTE</span> 
                                                                                                        <span class="badge bg-soft-success  tx-uppercase">BIEN</span>
                                                                                                        <span class="badge bg-soft-warning  tx-uppercase">PRONTO</span>
                                                                                                    </div>

                                                                                                


                                                                                                

                                                                                                </div>
                                                                                                
                                                                                                
                                                                                            </div>

                                                                                            

                                                                                        </div> 
                                                                                            <?php
                                                                                                if($historial->imagen!=null || $historial->imagen!=""){

                                                                                            
                                                                                            ?>
                                                                                                <div class="d-flex">
                                                                                                    <a href="<?php echo "https://mecgo2.s3.us-east-2.amazonaws.com/".$historial->imagen; ?>">
                                                                                                    <img  class="wd-100" src="<?php  echo "https://mecgo2.s3.us-east-2.amazonaws.com/".$historial->imagen; ?>"></a>
                                                                                                </div>

                                                                                            <?php
                                                                                                }   
                                                                                            ?>
                                                                                                        
                                                                                            
                                                                                    </div>

                                                                                                        
                                                                                
                                                                              
                                                                    

                                                                    <?php
                                                                        endif; //end if tipo de historial 1

                                                    
                                                                    
                                                                        endforeach;//foreach historial
                                                                    endif;//if si hay historiales 

                                                                    ?>    
                                                         
                                                     </div>  


                                                     <div id="<?php echo "accordionPronto".$i;?>" class="collapse" data-parent="#accordion">

                                                            <?php
                                                            $historial2=HistorialData::getByIdDiag($diagnostico->id);
                                                                        if($historial2!=null): //if historial

                                                                            
                                                                            foreach ($historial2 as $key => $historial2) : //foreach historial
                                                                                
                                                                                if($historial2->estado==2): //if de tipo de historial
                                                            ?>

                                                                                            <div class="card-body collapse show">
                                                                                                <div class="activity" >

                                                                                                    <i class="icon-check bg-soft-primary" ></i>
                                                                                                    <div class="time-item">
                                                                                                        <div class="item-info ">
                                                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                                                <h6 class="tx-dark tx-13 mb-0"><?php echo $historial->descripcion;?></h6>
                                                                                                                <span class="small"><?php echo $historial->fecha ;?></span>
                                                                                                            </div>
                                                                                                            <p class="mt-2 tx-12"><?php echo $historial->descripcion;?></p>
                                                                                                            
                                                                                                            
                                                                                                            <div class="col-md-12 col-lg-8 col-xl-9" >
                                                                                                            

                                                                                                                <span class="badge bg-soft-primary tx-uppercase">Design</span> 
                                                                                                                <span class="badge bg-soft-danger  tx-uppercase">URGENTE</span> 
                                                                                                                <span class="badge bg-soft-success  tx-uppercase">BIEN</span>
                                                                                                                <span class="badge bg-soft-warning  tx-uppercase">PRONTO</span>
                                                                                                            </div>

                                                                                                        


                                                                                                        

                                                                                                        </div>
                                                                                                        
                                                                                                        
                                                                                                    </div>

                                                                                                    

                                                                                                </div> 
                                                                                                    <?php
                                                                                                        if($historial->imagen!=null || $historial->imagen!=""){

                                                                                                    
                                                                                                    ?>
                                                                                                        <div class="d-flex">
                                                                                                            <a href="<?php echo "https://mecgo22.s3.us-east-2.amazonaws.com/".$historial->imagen; ?>">
                                                                                                            <img  class="wd-100" src="<?php  echo "https://mecgo22.s3.us-east-2.amazonaws.com/".$historial->imagen; ?>"></a>
                                                                                                        </div>

                                                                                                    <?php
                                                                                                        }   
                                                                                                    ?>
                                                                                                                
                                                                                                    
                                                                                            </div>

                                                                                                    





                                                                    <?php                               
                                                                                endif; //end if tipo de historial 1

                                                            
                                                                            
                                                                            endforeach;//foreach historial
                                                                        endif;//if si hay historiales 


                                                                                
                                                                        
                                                                    ?>
                                                                

                                                     </div>  




                                                        <div id="<?php echo "accordionUrgente".$i;?>" class="collapse" data-parent="#accordion">

                                                            <?php
                                                            $historial2=HistorialData::getByIdDiag($diagnostico->id);
                                                                        if($historial2!=null): //if historial

                                                                            
                                                                            foreach ($historial2 as $key => $historial2) : //foreach historial
                                                                                
                                                                                if($historial2->estado==3): //if de tipo de historial
                                                            ?>

                                                                                            <div class="card-body collapse show">
                                                                                                <div class="activity" >

                                                                                                    <i class="icon-check bg-soft-primary" ></i>
                                                                                                    <div class="time-item">
                                                                                                        <div class="item-info ">
                                                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                                                <h6 class="tx-dark tx-13 mb-0"><?php echo $historial->descripcion;?></h6>
                                                                                                                <span class="small"><?php echo $historial->fecha ;?></span>
                                                                                                            </div>
                                                                                                            <p class="mt-2 tx-12"><?php echo $historial->descripcion;?></p>
                                                                                                            
                                                                                                            
                                                                                                            <div class="col-md-12 col-lg-8 col-xl-9" >
                                                                                                            

                                                                                                                <span class="badge bg-soft-primary tx-uppercase">Design</span> 
                                                                                                                <span class="badge bg-soft-danger  tx-uppercase">URGENTE</span> 
                                                                                                                <span class="badge bg-soft-success  tx-uppercase">BIEN</span>
                                                                                                                <span class="badge bg-soft-warning  tx-uppercase">PRONTO</span>
                                                                                                            </div>

                                                                                                        


                                                                                                        

                                                                                                        </div>
                                                                                                        
                                                                                                        
                                                                                                    </div>

                                                                                                    

                                                                                                </div> 
                                                                                                    <?php
                                                                                                        if($historial->imagen!=null || $historial->imagen!=""){

                                                                                                    
                                                                                                    ?>
                                                                                                        <div class="d-flex">
                                                                                                            <a href="<?php echo "https://mecgo2.s3.us-east-2.amazonaws.com/".$historial->imagen; ?>">
                                                                                                            <img  class="wd-100" src="<?php  echo "https://mecgo2.s3.us-east-2.amazonaws.com/".$historial->imagen; ?>"></a>
                                                                                                        </div>

                                                                                                    <?php
                                                                                                        }   
                                                                                                    ?>
                                                                                                                
                                                                                                    
                                                                                            </div>

                                                                                                    





                                                                    <?php                               
                                                                                endif; //end if tipo de historial 1

                                                            
                                                                            
                                                                            endforeach;//foreach historial
                                                                        endif;//if si hay historiales 


                                                                                
                                                                        
                                                                    ?>
                                                                

                                                     </div>  

                                                     


                                                     


                                        <?php 
                                        $i++;
                                        }
                                        
                                        ?>

                                </div>
                            </div>
                        
                        </div>


                    
                    </div>



 
</div>