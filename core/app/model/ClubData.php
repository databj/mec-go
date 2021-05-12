<?php
class ClubData {
	public static $tablename = "club";//objeto de la TABLA EN LA BASE DE DATOS 


	public function ClubData(){ //METODO PARA PARA CREAR EL OBJETO Y SUS ATRIBUTOS 
		$this->id = ""; 
		$this->id_conductor = "";
		$this->entradas= "";
        $this->date_at = "";
        $this->time_at = "";
	} 
    		
    
	public function add(){// METODO PARA AÑADIR A LA BASE DE DATOS LOS CAMPOS TRAIDOS DE LA VISTA 
		$sql = "insert into club (id_conductor,entradas,date_at,time_at) ";
		$sql .= "value (\"$this->id_conductor\",\"$this->entradas\",\"$this->date_at\",\"$this->time_at\")";
		return Executor::doit($sql);
	}

	public static function delById($id){// METODO PARA ELIMINAR UNA FILA DE LA BASE DE DATOS  RECIBIENDO UN ID 
		$sql = "delete from ".self::$tablename." where id=$id";
		return	Executor::doit($sql);
	}
	public function del(){//ELIMINAR SIN NECESIDAD DE RECIBIR COMO PARAMETRO UN ID 
		$sql = "delete from ".self::$tablename." where id=$this->id";
		return		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un OBJETO club 
	public function update(){//ACTUALIZAR LOS ATRIBUTOS DIRECTAMENTE EN LA BASE DE DATOS 
		$sql = "update club set 
		id_conductor='".$this->id_conductor."',
		entradas='".$this->entradas."',
		date_at='".$this->date_at."'
		where id='".$this->id."'";
		return	Executor::doit($sql);
	}

	public static function getById($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from club where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClubData());

	}


	public static function getAll(){//OBTENER TODOS LOS DATOS DE LA TABLA "club"
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClubData());
	}

	
	public static function getLike($q){//OBTENER POR PALABRAS DIGITADAS 
		$sql = "select * from ".self::$tablename." where placa like '%$q%' or id_dueno like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClubData());

	}


}

?>