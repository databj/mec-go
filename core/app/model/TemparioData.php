<?php
class TemparioData {
	public static $tablename = "tempario";


	public function TemparioData(){//ATRIBUTOS Y METODO PARA CREAR UN OBJETO DE LA CLASE TEMPARIO
		$this->id = ""; 
		$this->id_tempario = "";
		$this->descripcion = "";
		$this->tiempo = "";
	
		
	} 

	public function add(){
		$sql = "insert into tempario (descripcion) ";
		$sql .= "value (\"$this->descripcion\")";
		return Executor::doit($sql);
	}
/*
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ClienteData previamente utilizamos el contexto
	public function update(){
		$sql = "update tempario set nombre='".$this->nombre."' where id='".$this->id."'";
		Executor::doit($sql);
	}
*/
	public static function getById($id){
		$sql = "select * from tempario where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TemparioData());

	}


	public static function getAll(){//OBTENER TODA LA LISTA DE TEMPARIOS 
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new TemparioData());
	}

	public static function getAll2(){//OBTENER TODA LA LISTA DE TEMPARIOS 
		$sql = "select * from prueba";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TemparioData());
	}

	/*
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%' or nit_ced like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TemparioData());

	}
*/

}

?>