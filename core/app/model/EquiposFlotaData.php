<?php
class EquiposFlotaData {
	public static $tablename = "equipos_flota";//NOMBRE DE LA TABLA EN LA BASE DE DATOS 


	public function EquiposFlotaData(){ //METODO PARA PARA CREAR EL OBJETO Y SUS ATRIBUTOS 
		$this->id = ""; 
		$this->id_flota = "";
		$this->id_equipo= NULL;
    
		
	} 
    		
    
	public function add(){// METODO PARA AÑADIR A LA BASE DE DATOS LOS CAMPOS TRAIDOS DE LA VISTA 
		$sql = "insert into equipos_flota (id_flota,id_equipo) ";
		$sql .= "value (\"$this->id_flota\",\"$this->id_equipo\")";
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
		$sql = "update equipos_flota set 
		id_flota='".$this->id_flota."',
		id_equipo='".$this->id_equipo."'
		where id='".$this->id."'";
		return	Executor::doit($sql);
	}

	public static function getById($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from equipos_flota where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EquiposFlotaData());

	}
	public static function getByIdEquipo($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from equipos_flota where id_equipo=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EquiposFlotaData());

	}

	public static function getByIdFlota($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from equipos_flota where id_flota=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquiposFlotaData());

	}


	public static function getAll(){//OBTENER TODOS LOS DATOS DE LA TABLA "FLOTA"
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquiposFlotaData());
	}

	
	public static function getLike($q){//OBTENER POR PALABRAS DIGITADAS 
		$sql = "select * from ".self::$tablename." where placa like '%$q%' or id_dueno like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquiposFlotaData());

	}


}

?>