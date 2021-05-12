<?php
class TecnicoData {
	public static $tablename = "tecnicos";//ATRIBUTO CON EL NOMBRE DE LA TABLA EN LA BASE DE DATOS 


	public function TecnicoData(){//METODO PARA CREAR UN OBJETO DE LA CLASE "TECNICO"
		$this->id = ""; 
		$this->nombre = "";
		$this->cc = "";
		$this->especialidad_1 = "";
		$this->especialidad_2 = "";
        $this->rank = 0;
        $this->score = 0;
		$this->estado=0;
	} 


	public function add(){//METODO PARA AÑADIR UN TECNICO A LA BASE DE DATOS 
		$sql = "insert into tecnicos (nombre,cc,especialidad_1,especialidad_2) ";
		$sql .= "value (\"$this->nombre\",\"$this->cc\",\"$this->especialidad_1\",\"$this->especialidad_2\")";
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

// partiendo de que ya tenemos creado un objeto DE LA CLASE "TECNICO"
	public function update(){//METODO PARA CTUALIZAR LA INFORMACION DE LA BASE DE DATOS DE ALGUN TECNICO
		$sql = "update tecnicos set nombre='".$this->nombre."'where id='".$this->id."'";
		return	Executor::doit($sql);
	}

	public function updateEstado(){//METODO PARA CTUALIZAR LA INFORMACION DE LA BASE DE DATOS DE ALGUN TECNICO
		$sql = "update tecnicos set estado='".$this->estado."'where id='".$this->id."'";
		return	Executor::doit($sql);
	}

	public static function getById($id){//OBTENER DATOS DE UN TECNICO EN ESPECIFICO DE LA BASE DE DATOS 
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TecnicoData());

	}

	public static function getByIdMany($id){//OBTENER DATOS DE UN TECNICO EN ESPECIFICO DE LA BASE DE DATOS 
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TecnicoData());

	}
	public static function getByIdCC($id){//OBTENER DATOS DE UN TECNICO EN ESPECIFICO DE LA BASE DE DATOS 
		$sql = "select * from ".self::$tablename." where cc='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TecnicoData());

	}



	public static function getAll(){//OBTENER LA INFORMACION DE TODOS LOS TECNICOS AÑADIDOS A LA BASE DE DATOS 
	
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TecnicoData());
	}

	
	public static function getLike($q){//OBTENER INFORMACION DE ALGUN TECNICO AÑADIDO A LA BASE DE DATOS CON RESPECTO A LOS DATOS QUE SE VAYAN DIGITANDO 
		$sql = "select * from ".self::$tablename." where nombre like '%$q%' or cc like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TecnicoData());

	}


}

?>