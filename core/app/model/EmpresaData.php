<?php
class EmpresaData {
	public static $tablename = "empresa";//NOMBRE DE LA TABLA EN LA BASE DE DATOS 


	public function EmpresaData(){//CONSTRUCTOR POR DEFECTO PARA LOS ATRIBUTOS DEL OBJETO "EMPRESA"
		$this->id = ""; 
		$this->nombre = null;
		$this->id_dueno = null;
		$this->id_dueno_conductor= null;
		$this->chat_api=null;
		
	} 

	
	public function add(){//METODO PARA CREAR UNA EMPRESA VERIFICACION SI ES UNA PERSONA NATURAL O JURIDICA Y PROCEDER A AÑADIRLA A LA BD 

			if(	$this->id_dueno != null){
				$sql = "insert into empresa (nombre,id_dueno) ";
				$sql .= "value (
					\"$this->nombre\",
					\"$this->id_dueno\")";
				return Executor::doit($sql);

			}

			if(	$this->id_dueno_conductor != null){
				$sql = "insert into empresa (nombre,id_dueno_conductor) ";
				$sql .= "value (
					\"$this->nombre\",
					\"$this->id_dueno_conductor\")";
				return Executor::doit($sql);

			}


		
	}

	public static function delById($id){//METODO PARA ELIMINAR RECIBIENDO UN PARAMETRO 
		$sql = "delete from ".self::$tablename." where id=$id";
		return	Executor::doit($sql);
	}
	public function del(){//METODO ELIMINAR POR DEFECTO 
		$sql = "delete from ".self::$tablename." where id=$this->id";
		return		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objeto EMPRESADATA
public function update(){//METODO PARA ACTUALIZAR LA INFORMACION


		if(	$this->id_dueno != null){
			$sql = "update empresa set 
		nombre='".$this->nombre."',
		id_dueno='".$this->id_dueno."'
		
		where id='".$this->id."'";

		return		Executor::doit($sql);

		}

		if(	$this->id_dueno_conductor != null){
			$sql = "update empresa set 
			nombre='".$this->nombre."',
			id_dueno_conductor='".$this->id_dueno_conductor."'
			where id='".$this->id."'";
		
			return		Executor::doit($sql);

		}


}
	public static function getById($id){//METODO PARA OBTENER LA INFO DE UNA EMPRESA PASANDO SU ID 
		$sql = "select * from empresa where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EmpresaData());

	}

	public static function getByNit($id){//METODO PARA OBTENER LA INFO DE UNA EMPRESA PASANDO SU ID 
		$sql = "select * from empresa where id_dueno=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EmpresaData());

	}

	public static function getByCC($id){//METODO PARA OBTENER LA INFO DE UNA EMPRESA PASANDO SU ID 
		$sql = "select * from empresa where id_dueno_conductor=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EmpresaData());

	}


	public static function getAll(){//METODO PARA CREAR UN ARRAY LOCAL DE TODOS LOS DATOS EN LA BD DE LA TABLA EMPRESA 
		$sql = "select * from ".self::$tablename." order by nombre asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EmpresaData());
	}

	
	public static function getLike($q){//TRAER LOS OBJETOS O FILAS QUE TENGAN EN ESPECIFICO UN CARACTER DESEADO 
		$sql = "select * from ".self::$tablename." where nombre like '%$q%' or id_dueno like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EmpresaData());

	}


}

?>