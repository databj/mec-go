<?php
class CotizacionData {
	public static $tablename = "cotizacion";


	public function CotizacionData(){
		$this->id = ""; 
		$this->id_proceso = null;
		$this->fuente = null;
		$this->numero_remision =null;
		$this->estado = null; 
		$this->garantia = null;
		$this->id_user =null;
		$this->start_date = null;
		$this->start_hour = null;
		
    } 
    
    	


	public function add(){
		$sql = "insert into cotizacion (id_proceso,fuente,numero_remision,estado,garantia,id_user,start_date,start_hour)";
		$sql .= "value (\"$this->id_proceso\",\"$this->fuente\",\"$this->numero_remision\",\"$this->estado\",\"$this->garantia\",\"$this->id_user\",\"$this->start_date\",\"$this->start_hour\")";
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
		$sql = "update ".self::$tablename." set id_proceso=\"$this->id_proceso\",fuente=\"$this->fuente\",numero_remision=\"$this->numero_remision\",estado=\"$this->estado\",garantia=\"$this->garantia\",id_user=\"$this->id_user\",start_date=\"$this->start_date\",end_date=\"$this->end_date\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CotizacionData());

	}

	public static function getByIdProceso($id){
		$sql = "select * from ".self::$tablename." where id_proceso=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CotizacionData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CotizacionData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where placa like '%$q%' or id_proceso like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CotizacionData());

	}


}

?>