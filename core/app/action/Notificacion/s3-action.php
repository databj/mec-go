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






?>