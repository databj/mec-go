<?php


//creamos un objeto de la clase Cliente para poder pasa los parametros que vienen de la vista 
                $Cliente = new ClienteData();   
                $Empresa = new EmpresaData();
                $Conductor = new ConductorData();

                
                        if($_POST["tipo"]=="Juridico"){

                                //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 
                                $Cliente->nombre=$_POST["nombre"];  
                                $Cliente->nit_ced = $_POST["cedula"];
                                $Cliente->contacto= $_POST["contacto"];
                                $Cliente->telefono= $_POST["telefono"];
                                $Cliente->email= $_POST["email"];
                                $Cliente->tipo =$_POST["tipo"];
                                        

                                $id_cliente=  $Cliente->add();//llamamos al metodo de la clase "Cliente" para ejecutar el Sql que envia a la BD 
                        

                                                if($id_cliente[0]=="1"){  //si se logra ingresar en la bd adicionamos la informacion para empresas 
                                                        //en caso sea juridico


                                                        $Empresa->nombre=$_POST["nombre"];
                                                        $Empresa->id_dueno =$_POST["cedula"] ;
                                                        
                                                        $id_empresa=  $Empresa->add();
                                                                                
                                                        $id_empresa[0]."<br>";
                                                }

                                
                        }else{

                                //creamos un objeto de la clase Conductor para poder pasa los parametros que vienen de la vista 
                        
                                //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 
                                //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 
                                $Cliente->nombre=$_POST["nombre"];  
                                $Cliente->nit_ced = $_POST["cedula"];
                                $Cliente->contacto= $_POST["contacto"];
                                $Cliente->telefono= $_POST["telefono"];
                                $Cliente->email= $_POST["email"];
                                $Cliente->tipo =$_POST["tipo"];
                                        
        
                                $id_cliente=  $Cliente->add();//llamamamos al metodo de la clase "Cliente" para ejecutar el Sql que envia a la BD 

                        
                                if($id_cliente[0]=="1"){


                                                $Conductor->nombre=$_POST["nombre"];
                                                $Conductor->cc = $_POST["cedula"];
                                                $Conductor->tipo = $_POST["tipo"];
                                                $Conductor->contacto= $_POST["telefono"];
                                                $Conductor->is_dueno=1;
                                                //$Conductor->tipo =$_POST["tipo"];
                                                

                                                $id_conductor=$Conductor->add();//llamamamos al metodo de la clase "Cliente" para ejecutar el Sql que envia a la BD 

                                 




                                                $Empresa->nombre=$_POST["nombre"];
                                                $Empresa->id_dueno_conductor =$_POST["cedula"];
                                                $id_empresa= $Empresa->add();

                                }


                        }



                if($id_empresa[0]==1){
                        core::alert("Añadido con exito");//mensaje de confirmacion
                        print "<script>window.location='index.php?view=Cliente/View_Cliente';</script>";//redireccion al index
                        

                }else{

                        core::alert("Error al registrar ");//mensaje de confirmacion
                        print "<script>window.location='index.php?view=ClienteView_Cliente';</script>";//redireccion al index
                        
                }


?>