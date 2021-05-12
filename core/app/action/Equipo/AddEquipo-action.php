<?php

//en caso que se desee registrar un Equipo, vehiculo, etc.
//se pasan los parametros que vienen de la vista y se envian al metodo de la clase Equipo.

        $user = new EquipoData();
       
	    $user->tipo =$_POST["tipo"];
                 $user->placa =$_POST["placa"];
		

        //$var=  $user->add();//metodo para añadir a la BD
   
                $valida=EquipoData::getByPlaca($_POST["placa"]);


                        if( $valida == null){
                                $user->add();//metodo para añadir a la BD
                                core::alert("Añadido con exito");
                                print "<script>window.location='index.php?view=Equipo/View_Equipo';</script>";
                        
                        }else{
                                        core::alert("Existe un equipo con esta PLACA");
                                        print "<script>window.location='index.php?view=Equipo/View_Equipo';</script>";
                        

                        }
//core::alert("Añadido con exito");
//print "<script>window.location='index.php?view=View_Equipo';</script>";
    
?>