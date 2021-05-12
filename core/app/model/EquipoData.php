<?php
class EquipoData {
	public static $tablename = "equipo";//NOMBRE DE LA TABLA EN LA BASE DE DATOS 


	public function EquipoData(){
		$this->id = ""; 
		$this->tipo = "";
		$this->placa = "";
       
		
	} 
    
    
	public function add(){//METODO PARA AÑADIR EL OBJETO A LA BASE DE DATOS 
		$sql = "insert into  equipo (tipo,placa) ";
		$sql .= "value (\"$this->tipo\",\"$this->placa\")";
		return Executor::doit($sql);
	}

	public static function delById($id){//METODO PARA ELIMINAR DE LA BASE DE DATOS
		$sql = "delete from ".self::$tablename." where id=$id";
		return	Executor::doit($sql);
	}
	public function del(){//METODO PARA ELIMINAR SIN RECIBIR UN PARAMETRO 
		$sql = "delete from ".self::$tablename." where id=$this->id";
		return	Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un OBJETO DE EQUIPODATA 
	public function update(){//METODO PARA ACTUALIZAR 
		$sql = "update equipo set 
		tipo='".$this->tipo."',
		placa='".$this->placa."'
		where id='".$this->id."'";
		return	Executor::doit($sql);
	}

	public static function getById($id){//OBTENER LA INFORMACION DE UNA SOLA FILA MEDIANDO UN ID 
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EquipoData());

	}
	public static function getByPlaca($id){//OBTENER LA INFORMACION DE UNA SOLA FILA MEDIANDO UN ID 
		$sql = "select * from ".self::$tablename." where placa='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EquipoData());

	}


	public static function getAll(){//OBTENER TODOS LOS OBJETOS AÑADIDOS A LA BASE DE DATOS 
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquipoData());
	}

	
	public static function getLike($q){//OBTENER EQUIPOS QUE EN SUS CAMPOS TENGAN LA INFORMACION DIGITADA
		$sql = "select * from ".self::$tablename." where placa like '%$q%' or id_dueno like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquipoData());

	}


}

?>