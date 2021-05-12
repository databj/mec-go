<?php
class Facturacion {
	public static $tablename = "facturacion";


	public function Facturacion(){
		$this->id = ""; 
		$this->id_cotizacion = "";
		$this->total = "";
		$this->satisfaccion = "";
		$this->garantia = "";
        $this->id_garantia = "";
	} 


	public function add(){
		$sql = "insert into".self::$tablename." (id_cotizacion,total,satisfaccion,garantia,id_garantia) ";
		$sql .= "value (\"$this->id_cotizacion\",\"$this->total\",\"$this->satisfaccion\",\"$this->garantia\",\"$this->id_garantia\")";
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
		$sql = "update ".self::$tablename." set id_cotizacion=\"$this->id_cotizacion\",total=\"$this->total\",satisfaccion=\"$this->satisfaccion\",garantia=\"$this->garantia\",id_garantia=\"$this->id_garantia\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Facturacion());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Facturacion());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id_cotizacion like '%$q%' or id_garantia like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Facturacion());

	}


}

?>