<?php
class ConductorData {
	public static $tablename = "conductor";//VARIABLE LOCAL CON EL NOMBRE DE LA BASE DE DATOS 


	public function ConductorData(){ //CONSTRUCTOR CON LOS ATRIBUTOS DE LA BASE DE DATOS 
		$this->id= ""; 
		$this->tipo= "";
		$this->nombre= "";
		$this->cc= "";
		$this->contacto= "";
		$this->is_dueno= null;
		$this->email= null;
	} 

	public function add(){//METODO PARA AÑADIR LOS VALORES A LA BASE DE DATOS 
		$sql = "insert into conductor (tipo,nombre,cc,contacto,is_dueno,email) ";
		$sql .= "value (
			\"$this->tipo\",
			\"$this->nombre\",
			\"$this->cc\",
			\"$this->contacto\",
			\"$this->is_dueno\",
			\"$this->email\")";
		return Executor::doit($sql);
	}

	public static function delById($id){//METODO PARA ELIMINAR DE LA BD UN CONDUCTOR PASANDO SU ID COMO PARAMETRO 
		$sql = "delete from ".self::$tablename." where id=$id";
		return	Executor::doit($sql);
	}
	public function del(){//METODO PARA ELIMINAR DIRECTAMENTE 
		$sql = "delete from conductor where id=".$this->id;
		return	Executor::doit($sql);
	}

	// partiendo de que ya tenemos creado un objeto ConductorData
	public function update(){//METODO PARA ACTUALIZAR CAMPOS DE LA BD 
		$sql = "update conductor set 
		tipo='".$this->tipo."',
		nombre='".$this->nombre."',
		cc='".$this->cc."',
		contacto='".$this->contacto."'
		where id='".$this->id."'";
		return	Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from conductor where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ConductorData());

	}

	
	public static function getByIdCC($id){
		$sql = "select * from conductor where cc=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ConductorData());

	}


	public static function getAll(){
		$sql = "select * from  conductor order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConductorData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%' or cc like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConductorData());

	}


}

?>