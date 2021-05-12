<!DOCTYPE html>
<html lang="zxx">
   
<div id="main-wrapper">
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
                                        foreach ($diagnostico as $key => $diagnostico) {
                                            
                                            $placa=EquipoData::getById($proceso->id_equipo);
                                            $Tempario=TemparioData::getById($diagnostico->tipo_diagnostico);

                                        
                                        ?>
                                                    <div class="alert alert-primary fade show" role="alert">
                                                        <?php echo $placa->placa."  ".$Tempario->descripcion; ?>
                                                        <a class="badge badge-success pull-right">

                                                        <form action="index.php?view=Historial" method="post">
                                                        <input type="hidden" name="id" value=<?php echo $proceso->id;?>>
                                                        <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                        <button class="dropdown-item" type="submit"><i class="fa fa-eye"></i> Ver Historial</button>  
                                                        </form>
                                                        </a>

                                                    </div>
                                            
                                        
                           </div>

                                    <div class="card-body collapse show" >
                                        <div class="activity">
                                            <i class="icon-check bg-soft-primary"></i>
                                            <div class="time-item">
                                                <div class="item-info ">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="tx-dark tx-13 mb-0">Task finished</h6>
                                                    <span class="small">05:00 PM Sun, 02 Feb 2019</span>
                                                </div>
                                                <p class="mt-2 tx-12">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                                <div><span class="badge bg-soft-primary tx-uppercase">Design</span> <span class="badge bg-soft-danger  tx-uppercase">HTML</span> <span class="badge bg-soft-success  tx-uppercase">Css</span> <span class="badge bg-soft-teal  tx-uppercase">Dashboard</span></div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                           <?php 
                           
                        }
                         
                         ?>




                        </div>


                      
                           
                        
                    
                     <!-- / Badges Alerts End -->
                
</div>

</html>