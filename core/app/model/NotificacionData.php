<?php
class NotificacionData {
	public static $tablename = "notificacion";


	public function NotificacionData(){
		$this->id = ""; 
		$this->id_ejecucion = "";
	
		$this->n1 = 0;
		$this->n2 = 0;
		$this->n3 = 0;
		$this->estado=0;
	
	} 

    			
	public function add(){
		$sql = "insert into notificacion (id_ejecucion,n1,n2,n3,estado) ";
		$sql .= "value (\"$this->id_ejecucion\",\"$this->n1\",\"$this->n2\",\"$this->n3\",\"$this->estado\")";
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
	public function update2n(){
		$sql = "update ".self::$tablename." set n2=1 where id=$this->id";
		Executor::doit($sql);
	}

	public function update1n(){
		$sql = "update ".self::$tablename." set n1=1 where id=$this->id";
		Executor::doit($sql);
	}

	public function update3n(){
		$sql = "update ".self::$tablename." set n3=1 where id=$this->id";
		Executor::doit($sql);
	}
	public function updateEstado(){
		$sql = "update ".self::$tablename." set estado=1 where id_ejecucion=$this->id_ejecucion";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from notificacion where id_ejecucion=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new NotificacionData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new NotificacionData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id_ejecucion like '%$q%' or fecha like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new NotificacionData());

	}


}

?>