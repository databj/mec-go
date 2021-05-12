<?php
class AddTecnicoData {
	public static $tablename = "add_tecnico";//id_ejec DE LA TABLA EN LA BASE DE DATOS 


	public function AddTecnicoData(){ //METODO PARA PARA CREAR EL OBJETO Y SUS ATRIBUTOS 
		$this->id = ""; 
		$this->id_tecnico = null;
		$this->id_diag= null;
        $this->estado= 0;
		
	} 
    		
    
	public function add(){// METODO PARA AÑADIR A LA BASE DE DATOS LOS CAMPOS TRAIDOS DE LA VISTA 
		$sql = "insert into add_tecnico (id_tecnico,id_diag,estado)";
		$sql .= "value ('".$this->id_tecnico."','".$this->id_diag."','".$this->estado."')";
		return Executor::doit($sql);
    }
    /*
    public function add(){// METODO PARA AÑADIR A LA BASE DE DATOS LOS CAMPOS TRAIDOS DE LA VISTA 
		$sql = "insert into add_tecnico (id_tecnico,id_diag,id_ejec,estado) ";
		$sql .= "value (\"$this->id_tecnico\",\"$this->id_diag\",\"$this->id_ejec\",\"$this->estado\")";
		return Executor::doit($sql);
	}
*/

	public static function delById($id){// METODO PARA ELIMINAR UNA FILA DE LA BASE DE DATOS  RECIBIENDO UN ID 
		$sql = "delete from ".self::$tablename." where id=$id";
		return Executor::doit($sql);
	}
	public function del(){//ELIMINAR SIN NECESIDAD DE RECIBIR COMO PARAMETRO UN ID 
		$sql = "delete from add_tecnico where id=$this->id";
		return Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un OBJETO FLOTA 
	public function updateEstado(){//ACTUALIZAR LOS ATRIBUTOS DIRECTAMENTE EN LA BASE DE DATOS 
		$sql = "update add_tecnico set estado='".$this->estado."' where id='".$this->id."'";
		return Executor::doit($sql);
	}

	

	public function update(){//ACTUALIZAR LOS ATRIBUTOS DIRECTAMENTE EN LA BASE DE DATOS 
		$sql = "update add_tecnico set 
		id_tecnico='".$this->id_tecnico."',
		id_diag='".$this->id_diag."',
		id_ejec='".$this->id_ejec."'
		where id='".$this->id."'";
		return Executor::doit($sql);
	}

	public static function getById($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from add_tecnico where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AddTecnicoData());

	}
	public static function getByDiag($id){//OBTENER TODOS LOS DATOS DE LA TABLA "FLOTA"
		$sql = "select * from add_tecnico where id_diag=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AddTecnicoData());
	}

	public static function getByDiag_Tec($id,$tec){//OBTENER TODOS LOS DATOS DE LA TABLA "FLOTA"
		$sql = "select * from add_tecnico where id_diag=\"$id\" and id_tecnico=\"$tec\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AddTecnicoData());
	}

	public static function getByTec($id){//OBTENER TODOS LOS DATOS DE LA TABLA "FLOTA"
		$sql = "select * from add_tecnico where id_tecnico=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AddTecnicoData());
	}


	public static function getAll(){//OBTENER TODOS LOS DATOS DE LA TABLA "FLOTA"
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AddTecnicoData());
	}

	
	public static function getLike($q){//OBTENER POR PALABRAS DIGITADAS 
		$sql = "select * from ".self::$tablename." where placa like '%$q%' or id_dueno like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AddTecnicoData());

	}


}

?>