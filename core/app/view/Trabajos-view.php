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
                if (isset($_POST["id"])) {
                    $procesos = ProcesoData::getByEmpresa($_POST["id"]);
                } else {
                    $procesos = ProcesoData::getByEmpresa($_GET["id"]);
                }
                foreach ($procesos as $key => $procesos) {
                    if (isset($_POST["id"])) {


                        if ($procesos->id_empresa == $_POST["id"] && $procesos->estado != "FINALIZADO") {
                            $placa = EquipoData::getById($procesos->id_equipo);
                            $Tempario = TemparioData::getById($procesos->tipo_trabajo);


                ?>
                            <div class="alert alert-primary fade show" role="alert">
                                <?php echo "Ver Trabajos para Vehiculo  --->  " . $placa->placa ?>
                                <a class="badge badge-success pull-right">

                                    <form action="index.php?view=Historial" method="post">
                                        <input type="hidden" name="id" value=<?php echo $procesos->id; ?>>

                                        <button class="dropdown-item" type="submit"><i class="fa fa-eye"></i> Ver Historial</button>
                                    </form>
                                </a>

                            </div>

                        <?php
                        }
                    }

                    if (isset($_GET["id"])) {


                        if ($procesos->id_empresa == $_GET["id"] && $procesos->estado != "FINALIZADO") {
                            $placa = EquipoData::getById($procesos->id_equipo);
                            $Tempario = TemparioData::getById($procesos->tipo_trabajo);


                        ?>
                            <div class="alert alert-primary fade show" role="alert">
                                <?php echo "Ver Trabajos para Vehiculo  --->  " . $placa->placa ?>
                                <a class="badge badge-success pull-right">

                                    <form action="index.php?view=Historial" method="post">
                                        <input type="hidden" name="id" value=<?php echo $procesos->id; ?>>

                                        <button class="dropdown-item" type="submit"><i class="fa fa-eye"></i> Ver Historial</button>
                                    </form>
                                </a>

                            </div>

                <?php
                        }
                    }
                }

                ?>

                <!--------------- <div class="alert alert-danger alert-bordered pd-y-15" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ico icon-close"></i></span>
                    </button>
                    <div class="d-sm-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                        <div class="mg-t-20 mg-sm-t-0">
                            <h5 class="mg-b-2 tx-danger">Oh snap! Change a few things up.</h5>
                            <p class="mg-b-0 tx-gray">Neque porro quisquam est, qui consectetur, adipisci velit...</p>
                        </div>
                    </div>
                </div>-->


            </div>
        </div>
    </div>
    <!-- / Badges Alerts End -->



</div>

</html>