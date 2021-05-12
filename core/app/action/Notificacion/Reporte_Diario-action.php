<?php
 $procesos = ProcesoData::getAll(); 

 
 
    
 $texto="";
$var=0;


 foreach ($procesos as $key => $proceso) {

    if($proceso->estado!="FINALIZADO"){
    $var++;
 $placa=EquipoData::getById($proceso->id_equipo);

 $tempario=TemparioData::getById($proceso->tipo_trabajo);
 $empresa =EmpresaData::getById($proceso->id_empresa);
 

   // echo $key;
  //  echo $proceso->id;


 $texto.="------ PROCESOS ACTIVO -------- #".$var."\n";
 $texto.="ID PROCESO: ".$proceso->id."\n"."\n";
 $texto.="HORA DE ENTRADA: ".$proceso->start_date." - ".$proceso->start_hour."\n";
 $texto.="PLACA: ".$placa->placa."\n";
 $texto.="EMPRESA: ".$empresa->nombre."\n";

                

 $texto.="DESCRIPCION: ".$tempario->descripcion."\n"."\n"."\n";
    }
 }

 //echo $texto;
 

      $api=new ApiData();
      $api->SendMessage($texto,"573226802238-1556558814@g.us");




        print "<script>window.location='index.php?view=Card';</script>";//redireccion al index


?>