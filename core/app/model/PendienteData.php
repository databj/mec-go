

<?php
class PendienteData {
	public static $tablename = "pendiente";


	public function PendienteData(){
		$this->id = ""; 
		$this->id_ejecucion = "";
		$this->start_date = "";
		$this->start_hour = "";
		$this->end_date = "";
		$this->end_hour = "";
		
	
	} 

	public function add(){
		$sql = "insert into pendiente (id_ejecucion,start_date,start_hour)";
		$sql .= "value (\"$this->id_ejecucion\",\"$this->start_date\",\"$this->start_hour\")";
		return Executor::doit($sql);
	}
	
	public function end(){
		$sql = "update pendiente set 
		end_date='".$this->end_date."',
		end_hour='".$this->end_hour."'
		where id_ejecucion='".$this->id_ejecucion."'";
	return	Executor::doit($sql);
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
		$sql = "update ".self::$tablename." set id_proceso=\"$this->id_proceso\",placa=\"$this->placa\",tipo_diagnostico=\"$this->tipo_diagnostico\",tiempo_estimado=\"$this->tiempo_estimado\",estado=\"$this->estado\",start_date=\"$this->start_date\",end_date=\"$this->end_date\",novedades=\"$this->novedades\",id_user=\"$this->id_user\",tecnico_1=\"$this->tecnico_1\",tecnico_2=\"$this->tecnico_2\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PendienteData());

	}
	public static function getByIdEjec($id){
		$sql = "select * from pendiente where id_ejecucion='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PendienteData());

	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PendienteData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id_proceso like '%$q%' or id_garantia like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PendienteData());

	}


}

?>