
<?php

$novedades=($_POST["novedades"]);

  foreach($_FILES['image']['name'] as $key=>$val):
          
          
          $image= $_FILES['image']['tmp_name'][$key];
          
          if($image){

            $imgContenido = addslashes(file_get_contents($image));
           // $img=BroadcastData::add($val);
            $img=new BroadcastData();
            $img->imagen=$val;
            $img->mensaje=nl2br($novedades);
           $aux= $img->add();
            
          }
    endforeach;



//MENSAJE PARA TODOS
          


          $empresas=EmpresaData::getAll();

                    $texto=nl2br($novedades);
                   

                      
foreach($empresas as $empresa):


    if($empresa->chat_api!=null){



      $api=new ApiData();
      $api->SendMessage($texto,$empresa->chat_api);


                    /*
                            $arr=json_encode(array(
                                                
                                "chatId"=>$empresa->chat_api,
                                
                                "body"=>$texto,

                            ));

                                  

                            $url="https://api.chat-api.com/instance267918/message?token=khwh8h3uujdoaksf";
                          
                            

                        $ch=curl_init();
                        curl_setopt($ch,CURLOPT_URL,$url);
                        curl_setopt($ch,CURLOPT_POST,true);
                        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                        curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
                        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
                          'Content-type:application/json',
                          'Content-length:'.strlen($arr)
                        ));
                        $result=curl_exec($ch);
                        curl_close($ch);
                      //fin mensaje
                    */



    }
endforeach;
                         
        




           $files=$_FILES['image'];
       
        include("core/app/action/Notificacion/s3_broadcast-action.php");
       


        print "<script>window.location='index.php?view=Card';</script>";//redireccion al index


    ?>
