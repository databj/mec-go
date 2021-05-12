<?php
class Garantia {
	public static $tablename = "Garantia";


	public function Garantia(){
		$this->id = ""; 
		$this->estado = "";
		$this->id_proceso = "";

		
	} 

	public function add(){
		$sql = "insert into".self::$tablename." (estado,id_proceso) ";
		$sql .= "value (\"$this->estado\",\"$this->id_proceso\")";
		return Executor::doit($sql);
	}

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
		$sql = "update ".self::$tablename." set estado=\"$this->estado\",id_proceso=\"$this->id_proceso\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Garantia());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Garantia());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where estado like '%$q%' or id_proceso like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Garantia   ());

	}


}

?>