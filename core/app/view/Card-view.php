<!DOCTYPE html>
<html lang="zxx">
   
<div id="main-wrapper">
     <!-- Badges Alerts Start -->
                     <!--================================-->							
                     <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-20">
                           <div class="card-header">
                              <h4 class="card-header-title">
                               <center> Historial De Trabajos
                              </h4>
                              
                           </div>
                           <div class="card-body collapse show" id="collapse3">
                           <?php 
                           $procesos=ProcesoData::getAll();
                           foreach ($procesos as $key => $procesos) {
                              
                           if($procesos->id_empresa==299 && $procesos->estado!= "FINALIZADO"){
                              $placa=EquipoData::getById($procesos->id_equipo);
                              $Tempario=TemparioData::getById($procesos->tipo_trabajo);

                           
                           ?>
                              <div class="alert alert-primary fade show" role="alert">
                                <?php echo "Ver Trabajos para Vehiculo  --->  ".$placa->placa ?>
                                 <a class="badge badge-success pull-right">

                                 <form action="index.php?view=Historial" method="post">
                                 <input type="hidden" name="id" value=<?php echo $procesos->id;?>>
                                
                                 <button class="dropdown-item" type="submit"><i class="fa fa-eye"></i> Ver Historial</button>  
                                 </form>
                                 </a>

                              </div>
                            
                            <?php 
                           }
                           }
                            
                            ?>
                           </div>
                        </div>
                     </div>
                     <!-- / Badges Alerts End -->
                
</div>

</html>