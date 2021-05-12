<?php

date_default_timezone_set("America/Bogota");


$diagnostico= DiagnosticoData::getById($_POST["id"]);
$diagnostico->estado;
$diagnostico->estado="Pendiente";
$diagnostico->PendienteEstado();

$tecnico=AddTecnicoData::getByDiag($diagnostico->id);
foreach($tecnico as $tecnico){
  
  $tec=TecnicoData::getById($tecnico->id_tecnico);
        $tec->estado=2;
        $tec->updateEstado();

  $tecnico->estado=2;
  $tecnico->updateEstado();

  

}
  $ejecucion=EjecucionData::getByIdDiag($_POST["id"]);

  $pendiente= new PendienteData();
  $pendiente->id_ejecucion=$ejecucion->id;
  
  $pendiente->start_date=date("Y-m-d");
  $pendiente->start_hour=date("H:i:s");
  $pendiente->add();






$diagnostico=DiagnosticoData::getById($_POST["id"]);
$tempario=TemparioData::getById($diagnostico->tipo_diagnostico);
$proceso=ProcesoData::getById($diagnostico->id_proceso);
$empresa =EmpresaData::getById($proceso->id_empresa);
$chat_api=$empresa->chat_api;
$equipo=EquipoData::getById($proceso->id_equipo);
$diagnostico->estado="En Proceso";


$texto="Diagnostico Pendiente Por Repuesto"."\n"."\n";
$texto.="Proceso Id:".$proceso->id."\n";
$texto.="Placa: ".$equipo->placa."\n"."\n";
$texto.="Diagnostico:"."\n";
$texto.=$tempario->descripcion."\n"."\n";
$texto.="Hora: ".date("Y-m-d H:i:s")."\n";
$texto.="Descripcion :".$diagnostico->novedades;




print "<script>window.location='index.php?view=Diagnostico/View_Diagnostico';</script>";//redireccion al index

?>