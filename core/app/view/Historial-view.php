
     <!-- Badges Alerts Start -->
                     <!--================================-->							
                     <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-40">
                           <div class="card-header">
                              <h4 class="card-header-title">
                               <center> Historial De Trabajos
                              </h4>
                              
                           </div>
                           
                           <div class="card-body collapse show" id="collapse3">
                                        <?php 
                                            $diagnostico=DiagnosticoData::getByIdProceso($_POST["id"]);
                                            $proceso=ProcesoData::getById($_POST["id"]);
                                            $i=0;
                                            foreach ($diagnostico as $key => $diagnostico) {
                                              
                                                
                                                $placa=EquipoData::getById($proceso->id_equipo);
                                                $Tempario=TemparioData::getById($diagnostico->tipo_diagnostico);

                                                $historial=HistorialData::getByIdDiag($diagnostico->id);
                                        ?>
                                        
                                                    <div class="alert alert-primary fade show" role="alert">
                                                        <?php echo $diagnostico->id."   ".$placa->placa." - ".$Tempario->descripcion; ?>
                                                        <a class="badge badge-success pull-right">

                                                      
                                                        <?php echo $i;?><button  class="btn btn-primary" data-toggle="collapse" href="<?php echo "#multiCollapseExample".$i; ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">ver mas</button>  
                                                        
                                                        </a>

                                                    </div>


                                               
                                               
                                              
 
                                                            
                                                    <?php
                                                    if($historial!=null):

                                                    
                                                    foreach ($historial as $key => $historial) :
                                                        
                                                   
                                                    ?>
                                                    <div class="collapse multi-collapse" id="<?php echo "multiCollapseExample".$i; ?>">

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
                                                                                        <span class="badge bg-soft-danger  tx-uppercase">HTML</span> 
                                                                                        <span class="badge bg-soft-success  tx-uppercase">Css</span>
                                                                                        <span class="badge bg-soft-teal  tx-uppercase">Dashboard</span>
                                                                                    </div>

                                                                                  


                                                                                

                                                                                </div>
                                                                                
                                                                                
                                                                            </div>

                                                                             

                                                                        </div> 

                                                                                <div class="d-flex">
                                                                                <a href="https://mecgo.s3.us-east-2.amazonaws.com/IMG_20210518_093952.jpg">
                                                                                    <img  class="wd-100" src="https://mecgo.s3.us-east-2.amazonaws.com/IMG_20210518_093952.jpg"></a>
                                                                                </div> 
                                                                                          
                                                                            
                                                                    </div>

                                                                                        
                                                                
                                                    </div>         
                                                        

                                                    <?php

                                                        endforeach;
                                                    endif;
                                                    ?>    
                                               
                                                


                                        <?php 
                                        $i++;
                                        }
                                        
                                        ?>


                            </div>

                        </div>


                    
                    </div>



 
</div>