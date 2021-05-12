

<?php
class ProcesoData {
	public static $tablename = "proceso";


	public function ProcesoData(){
		$this->id = ""; 
		$this->id_user = "";
		$this->id_equipo = "";
		$this->id_trailer=null;
		$this->kilometraje = "";
		$this->tipo_trabajo = "";
      
        
        $this->id_conductor = ""; 
		$this->id_empresa = "";
		$this->tipo_pago = null;
		$this->estado = "Activo";
		$this->start_date = null;
        $this->start_hour = null;
		$this->garantia = null;
		$this->created_at = null;
		$this->end_date=null;
		$this->end_date=null;
		
        
	} 

   
/*
	public function add(){
		$sql = "insert into".self::$tablename." (id_user,id_equipo,kilometraje,tipo_trabajo,id_conductor,id_empresa,tipo_pago,estado,start_date,start_hour,garantia) ";
		$sql .= "value (\"$this->id_user\",\"$this->id_equipo\",\"$this->kilometraje\",\"$this->tipo_trabajo\",\"$this->id_conductor\",\"$this->id_empresa\",\"$this->tipo_pago\",\"$this->estado\",\"$this->start_date\",\"$this->start_hour\",\"$this->garantia\")";
		return Executor::doit($sql);
	}
*/

	public function add(){
		$sql = "insert into proceso (id_user,id_equipo,id_trailer,kilometraje,tipo_trabajo,id_conductor,id_empresa,created_at,start_date,start_hour,estado,tipo_pago,garantia) ";
		$sql .= "value (\"$this->id_user\",\"$this->id_equipo\",\"$this->id_trailer\",\"$this->kilometraje\",\"$this->tipo_trabajo\",\"$this->id_conductor\",\"$this->id_empresa\",\"$this->created_at\",\"$this->start_date\",\"$this->start_hour\",\"$this->estado\",\"$this->tipo_pago\",\"$this->garantia\")";
		return Executor::doit($sql);
	}




	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		return	Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		return	Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ClienteData previamente utilizamos el contexto
	public function update(){
		$sql = "update proceso set 
		kilometraje='".$this->kilometraje."',
		id_equipo='".$this->id_equipo."',
		id_trailer='".$this->id_trailer."',
		tipo_trabajo='".$this->tipo_trabajo."',
		id_empresa='".$this->id_empresa."',
		estado='".$this->estado."',
		start_date='".$this->start_date."',
		start_hour='".$this->start_hour."',
		end_date='".$this->end_date."',
		end_hour='".$this->end_hour."'
		where id='".$this->id."'";
		return		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from proceso where id='".$id."'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}

	public static function getByEmpresa($id){
		$sql = "select * from proceso where id_empresa='".$id."'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id_empresa like '%$q%' or placa like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function contador(){
		$sql = "Select count(start_date) as counted_leads, start_date as count_date from proceso group by start_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function contador2($dia){
		$sql = "Select count(start_date) as counted_leads, start_date as count_date from proceso where start_date='".$dia."' group by start_date";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}
        

        

        

}

?>