<?php


class ApiData {
	

	public function ApiData(){
		$this->instanceId = "267918"; 
		$this->token = "khwh8h3uujdoaksf";
	
		
	} 

	public function SendMessage($texto,$telefono){//METODO PARA AÑADIR 
	

        $data = [
            'chatId' => $telefono, // Receivers phone
        
            'body' => $texto// Message
           ];
           $json = json_encode($data); // Encode data to JSON
           // URL for request POST /message
           $token = $this->token;
           $instanceId = $this->instanceId;
           $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
           // Make a POST request
           $options = stream_context_create(['http' => [
                  'method'  => 'POST',
                  'header'  => 'Content-type: application/json',
                  'content' => $json
              ]
           ]);
        
           // Send a request
           $result = file_get_contents($url, false, $options);

           
	}

    
	public function SendFile($telefono,$placa,$imagenes){//METODO PARA AÑADIR 
	
       $data = [
            "body"=> "https://mecgo.s3.us-east-2.amazonaws.com/".$imagenes[0]->imagenes,
            "filename"=> $imagenes[0]->imagenes,
            "caption"=> $placa->placa,
            "chatId"=> $telefono
           ];
           $json = json_encode($data); // Encode data to JSON
           // URL for request POST /message
           $token = $this->token;
           $instanceId = $this->instanceId;
           $url = 'https://api.chat-api.com/instance'.$instanceId.'/sendFile?token='.$token;
           // Make a POST request
           $options = stream_context_create(['http' => [
                  'method'  => 'POST',
                  'header'  => 'Content-type: application/json',
                  'content' => $json
              ]
           ]); 
        
           // Send a request
           $result = file_get_contents($url, false, $options);

           
	}

       
	public function SendFileBroadcast($empresa,$imagenes){//METODO PARA AÑADIR 
	
        $data = [
            "body"=> "https://mecgo.s3.us-east-2.amazonaws.com/".$imagenes[0]->imagen,
            "filename"=> $imagenes[0]->imagen,
            "caption"=> "BroadCast MCI SERVICE",
            "chatId"=> $empresa->chat_api
           ];
           $json = json_encode($data); // Encode data to JSON
           // URL for request POST /message
           $token = $this->token;
           $instanceId = $this->instanceId;
           $url = 'https://api.chat-api.com/instance'.$instanceId.'/sendFile?token='.$token;
           // Make a POST request
           $options = stream_context_create(['http' => [
                  'method'  => 'POST',
                  'header'  => 'Content-type: application/json',
                  'content' => $json
              ]
           ]);
        
           // Send a request
           $result = file_get_contents($url, false, $options);

           
	}



}


?>

