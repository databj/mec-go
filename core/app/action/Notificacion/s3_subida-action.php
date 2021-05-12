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

	$uploadObject = $s3->putObject(
		[
			'Bucket' => 'mecgo',
			'Key' => $files['name'][0],
			'SourceFile' => $files['tmp_name'][0],
			'ACL'    => 'public-read'
		]); 


		if($chat_api!=null){

		 
				$imagenes=ImagenesData::getImg2($id);
				$placa=EquipoData::getById($procesos->id_equipo);


				$api=new ApiData();
				$api->SendFile($chat_api,$placa,$imagenes);
	   
/*
				$arr=json_encode(array(
											
					"body"=> "https://mecgo.s3.us-east-2.amazonaws.com/".$imagenes[0]->imagenes,
					"filename"=> $imagenes[0]->imagenes,
					"caption"=> $placa->placa,
					"chatId"=> $chat_api

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
	}		

	//print_r($uploadObject); 



/* descarga de archivo

if($_POST['key'])
{
	$getFile = $s3->getObject([

		'Key' => $_POST['key'],
		'Bucket' => 'mecgo'
	]);

	$getFile = $getFile->toArray();

	file_put_contents($_POST['key'], $getFile['Body']); 
}
*/




?>