<?php

date_default_timezone_set("America/Bogota");

//$user = new ProcesoData();
/*
echo $user->id_user=$_SESSION["user_id"]."<br />";  
echo $user->id_equipo = $_POST["placa"]."<br />";
echo $user->kilometraje= $_POST["kilometraje"]."<br />";
echo $user->tipo_trabajo =$_POST["tipo"]."<br />";
echo $user->id_conductor =$_POST["conductor"]."<br />";
echo $user->id_empresa =$_POST["empresa"]."<br />";
echo $user->tipo_pago =$_POST["tipo_pago"]."<br />";
echo $user->garantia =$_POST["garantia"]."<br />";
*/
        $novedades="";
        $masTrabajos="";
        $novedades=($_POST["novedades"]);
//creamos un objeto de la clase Cliente para poder pasa los parametros que vienen de la vista 
        $user = new ProcesoData();
       

        //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 
        $user->id_user=$_SESSION["user_id"];  
        $user->id_equipo = $_POST["placa"];
        $user->id_trailer=$_POST["trailer"];
        $user->kilometraje= $_POST["kilometraje"];
        $user->tipo_trabajo =$_POST["tipo"];
        $user->tipo_pago =$_POST["tipo_pago"];
        $user->garantia =$_POST["garantia"];
        $user->id_conductor =$_POST["conductor"];

        
        $user->id_empresa =$_POST["empresa"];
        $user->created_at=date("Y-m-d H:i:s");
        $hora= $user->created_at;
        
        if($_POST["date_at"]==""){

                            $user->start_date=date("y-m-d");
                            $user->start_hour=date('H:i:s');
        }else{
                            
                              $user->start_date=$_POST["date_at"];
                              $user->start_hour= $_POST["time_at"];
          
          
          
        }
       
          $var= $user->add();//llamamamos al metodo de la clase "Proceso" para ejecutar el Sql que envia a la BD 

          
                        //primer diagnostico 

                        $diag=null;
                        $diag = new DiagnosticoData();
                        $diag->id_proceso=$var[1];
                        $diag->placa=$_POST["placa"];
                        $diag->tipo_diagnostico=$_POST["tipo"];
                        
                        $diag->novedades=nl2br($novedades);
                       
                        $diag->start_date=date("y-m-d");
                        $diag->start_hour=date('H:i:s');
                        
                        
                        $diag->add2();




                        //primer diganostico

        //añadir imagen 

      // $revisar = getimagesize($_FILES["image"]["tmp_name"]);
       //$image = $_FILES['image']['tmp_name'];
       //$imgContenido = addslashes(file_get_contents($image));
       //$img=ImageData::add($imgContenido,$var[1]);

  
          foreach($_FILES['image']['name'] as $key=>$val):
          
          
                $image= $_FILES['image']['tmp_name'][$key];
                
                if($image){

                  $imgContenido = addslashes(file_get_contents($image));
                  $img=ImagenesData::add($val,$var[1]);
                  
                }
          endforeach;




        ///////////AÑADIR DIAGNOSTICOS /////////7
      

        if(isset($_POST['trabajos'])){


          $prueba=$_POST["trabajos"];
    
   

          if($prueba[0]!=null ){

              foreach ($prueba as $prueba) {
  



                      
                      $diag=null;
                      $diag = new DiagnosticoData();
                      $diag->id_proceso=$var[1];
                      $diag->placa=$_POST["placa"];
                      $diag->tipo_diagnostico=$prueba;
                      
                      $diag->novedades=nl2br($novedades);
                      
                      $diag->start_date=date("y-m-d");
                      $diag->start_hour=date('H:i:s');

                      $temparioAux=TemparioData::getById($diag->tipo_diagnostico);

                      $masTrabajos.="DIAGNOSTICOS: ".$temparioAux->descripcion."\n"."\n";
                      

                      $diag->add2();
          
              } 
          }	

        }


              
        
        /////////////////
        
        

    if($var[0]==1){

      core::alert("Añadido con exito");//mensaje de confirmacion
      //print "<script>window.location='index.php?action=Correo2&id=".$var[1]."';</script>";//redireccion al index
      include("core/app/action/Notificacion/Correo2-action.php");
    }else{
      core::alert("Error al añadir el proceso");//mensaje de confirmacion
      print "<script>window.location='index.php?view=Proceso/View_Procesos';</script>";//redireccion al index
      
    }

?>
