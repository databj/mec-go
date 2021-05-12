

<?php
class DiagnosticoData{
	public static $tablename = "diagnostico";


	public function DiagnosticoData(){
		$this->id = ""; 
		$this->id_proceso = null;
		$this->placa = null;
		$this->tipo_diagnostico = null;
		$this->tiempo_estimado = null;    
        $this->estado = null; 
		$this->start_date = null;
		$this->start_hour = null;
		$this->novedades = null;
		$this->id_user = null;
		$this->mas_tecnicos = 0;
        
	} 

	public function add(){
		$sql = "insert into diagnostico (id_proceso,placa,tipo_diagnostico,tiempo_estimado,estado,start_date,start_hour,novedades) ";
		$sql .= "value (\"$this->id_proceso\",\"$this->placa\",\"$this->tipo_diagnostico\",\"$this->tiempo_estimado\",\"$this->estado\",\"$this->start_date\",\"$this->start_hour\",\"$this->novedades\")";
		return Executor::doit($sql);
	}

	public function add2(){
		$sql = "insert into diagnostico (id_proceso,placa,tipo_diagnostico,tiempo_estimado,estado,start_date,start_hour,novedades,mas_tecnicos) ";
		$sql .= "value (\"$this->id_proceso\",\"$this->placa\",\"$this->tipo_diagnostico\",\"$this->tiempo_estimado\",\"$this->estado\",\"$this->start_date\",\"$this->start_hour\",\"$this->novedades\",\"$this->mas_tecnicos\")";
		return Executor::doit($sql);
	}





	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		return Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
	return 	Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ClienteData previamente utilizamos el contexto
	public function update(){
		$sql = "update diagnostico set 
		novedades='".$this->novedades."',
		start_date='".$this->start_date."',
		start_hour='".$this->start_hour."'
		where id='".$this->id."'";
	return	Executor::doit($sql);
	}

	public function ConfirmEstado(){
		$sql = "update diagnostico set 
		estado='".$this->estado."'
		where id='".$this->id."'";
	return	Executor::doit($sql);
	}

	public function FinEstado(){
		$sql = "update diagnostico set 
		estado='".$this->estado."'
		where id='".$this->id."'";
	return	Executor::doit($sql);
	}

	public function PendienteEstado(){
		$sql = "update diagnostico set 
		estado='".$this->estado."'
		where id='".$this->id."'";
	return	Executor::doit($sql);
	}

	public function ContinuarEstado(){
		$sql = "update diagnostico set 
		estado='".$this->estado."'
		where id='".$this->id."'";
	return	Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new DiagnosticoData());

	}
	public static function getByIdProceso($id){
		$sql = "select * from diagnostico where id_proceso='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DiagnosticoData());

	}


	public static function getAll(){
		$sql = "select * from diagnostico";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DiagnosticoData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id_proceso like '%$q%' or placa like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DiagnosticoData());

	}


}

?>