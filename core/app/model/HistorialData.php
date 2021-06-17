<?php
class HistorialData {
	public static $tablename = "historial";//imagen DE LA TABLA EN LA BASE DE DATOS 


	public function HistorialData(){ //METODO PARA PARA CREAR EL OBJETO Y SUS ATRIBUTOS 
		$this->id = ""; 
		$this->id_diag = "";
		$this->descripcion="";
        $this->imagen = null;
        $this->fecha = "";
		
	} 
    		
    
	public function add(){// METODO PARA AÑADIR A LA BASE DE DATOS LOS CAMPOS TRAIDOS DE LA VISTA 
		$sql = "insert into historial (id_diag,descripcion,imagen,fecha) ";
		$sql .= "value (\"$this->id_diag\",\"$this->descripcion\",\"$this->imagen\",\"$this->fecha\")";
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

// partiendo de que ya tenemos creado un OBJETO historial 
	public function update(){//ACTUALIZAR LOS ATRIBUTOS DIRECTAMENTE EN LA BASE DE DATOS 
		$sql = "update historial set 
		id_diag='".$this->id_diag."',
		descripcion='".$this->descripcion."',
		imagen='".$this->imagen."'
		where id='".$this->id."'";
		return	Executor::doit($sql);
	}

	public static function getById($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from historial where id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistorialData());

	}

	public static function getByIdDiag($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from historial where id_diag=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistorialData());

	}

	public static function getImg2($id){//OBTENER CAMPOS DESDE UN ID ENVIADO DE LA VISTA
		$sql = "select * from historial where id ='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BroadcastData());

	}

	public static function contadorBien($id_diag){
		$sql = "Select count(estado) as total from historial where estado=1 and id_diag=$id_diag";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoData());

	}

	public static function contadorUrgente($id_diag){
		$sql = "Select count(estado) as total from historial where estado=3 and id_diag=$id_diag";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoData());

	}

	public static function contadorPronto($id_diag){
		$sql = "Select count(estado) as total from historial where estado=2 and id_diag=$id_diag";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoData());

	}


	public static function getAll(){//OBTENER TODOS LOS DATOS DE LA TABLA "historial"
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistorialData());
	}

	
	public static function getLike($q){//OBTENER POR PALABRAS DIGITADAS 
		$sql = "select * from ".self::$tablename." where placa like '%$q%' or id_dueno like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HistorialData());

	}


}

?>