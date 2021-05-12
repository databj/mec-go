<?php
class BroadcastData {
	public static $tablename = "broadcast";//NOMBRE DE LA TABLA EN LA BASE DE DATOS 


	public function BroadcastData(){ //METODO PARA PARA CREAR EL OBJETO Y SUS ATRIBUTOS 
		$this->id= ""; 
		$this->imagen = null;
		$this->mensaje = null;
	

		
	
	} 
    		
    
	public function add(){// METODO PARA AÑADIR A LA BASE DE DATOS LOS CAMPOS TRAIDOS DE LA VISTA 
		$sql = "insert into broadcast (imagen,mensaje) values (\"$this->imagen\",\"$this->mensaje\")";
		
		return Executor::doit($sql);
	}

	public static function delById($id){// METODO PARA ELIMINAR UNA FILA DE LA BASE DE DATOS  RECIBIENDO UN ID 
		$sql = "delete from ".self::$tablename." where id=$id";
    	return	Executor::doit($sql);
	}
	public function del(){//ELIMINAR SIN NECESIDAD DE RECIBIR COMO PARAMETRO UN ID 
		$sql = "delete from ".self::$tablename." where id=$this->id";
	    return	Executor::doit($sql);
	}
	

// partiendo de que ya tenemos creado un OBJETO FLOTA 
	public function update(){//ACTUALIZAR LOS ATRIBUTOS DIRECTAMENTE EN LA BASE DE DATOS 
		$sql = "update broadcast set 
		id_flota='".$this->id_flota."',
		id_equipo='".$this->id_equipo."'
		where id='".$this->id."'";
		return	Executor::doit($sql);
	}

	public static function getById($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from broadcast where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BroadcastData());

	}


	public static function getImg($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select imagen from broadcast where id ='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BroadcastData());

	}

	public static function getImg2($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from broadcast where id ='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BroadcastData());

	}
	public static function getImgAll($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from broadcast where id ='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BroadcastData());

	}



	public static function getAll(){//OBTENER TODOS LOS DATOS DE LA TABLA "FLOTA"
		$sql = "select * from broadcast order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BroadcastData());
	}

	
	public static function getLike($q){//OBTENER POR PALABRAS DIGITADAS 
		$sql = "select * from ".self::$tablename." where placa like '%$q%' or id_dueno like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BroadcastData());

	}


}

?>