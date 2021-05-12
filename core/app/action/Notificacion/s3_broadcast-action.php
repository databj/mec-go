<?php

include_once('composer/vendor/autoload.php'); 

use Aws\S3\S3Client; 
use Aws\Exception\AwsException; 

$S3Options = 
[
	'version' => 'latest',
	'region'  => 'us-east-2',
	'credentials' => 
	[
		'key' => 'AKIAIXRMC7AFICESYSVA',
		'secret' => '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'
	]
]; 


$s3 = new S3Client($S3Options); 


// listar archivos
/*
$archivos = $s3->listObjects(
[
	'Bucket' => 'mecgo'
]); 

$archivos = $archivos->toArray();


$fila = ""; 

foreach ($archivos['Contents'] as $archivo) 
{
	$fila .= "<tr><td>{$archivo['Key']}</td>";
	$fila .= "<td>mecgo</td>";
	$fila .= "<td>{$archivo['Size']}</td>";
	$fila .= "<td>{$archivo['LastModified']}</td>";
	$fila .= "<td><button onclick='getFile(&#34;{$archivo['Key']}&#34;)'>Descarga</button></td></tr>"; 
}

echo $fila; 
*/

// carga del archivo
if($files['name'][0])
{
echo $files['name'][0];
echo  $files['tmp_name'][0];


	$uploadObject = $s3->putObject(
		[
			'Bucket' => 'mecgo',
			'Key' => $files['name'][0],
			'SourceFile' => $files['tmp_name'][0],
			'ACL'    => 'public-read'
		]); 


		

		 
				$imagenes=BroadcastData::getImg2($aux[1]);
				

                echo $imagenes[0]->imagen;



                        
                    foreach($empresas as $empresa):


                            if($empresa->chat_api!=null){
                        
                                $api=new ApiData();
                                $api->SendFileBroadcast($empresa,$imagenes);
                       
                /*

                                        $arr=json_encode(array(
                                                                    
                                            "body"=> "https://mecgo.s3.us-east-2.amazonaws.com/".$imagenes[0]->imagen,
                                            "filename"=> $imagenes[0]->imagen,
                                            "caption"=> "BroadCast MCI SERVICE",
                                            "chatId"=> $empresa->chat_api

                                        ));

                            
                            
                                        $url="https://api.chat-api.com/instance267918/sendFile?token=khwh8h3uujdoaksf";
                                                    



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


*/

                            }
                    endforeach;
                                                    
                                    
                        

		
	}		


?>