<?php
class ClienteData {
	public static $tablename = "cliente";//ATRIBUTO DE LA CLASE CON EL NOMBRE DE LA TABLA EN LA BD


	public function ClienteData(){
		$this->id = ""; 
		$this->tipo = "";
		$this->nombre = "";
		$this->nit_ced = "";
		$this->contacto = "";
		$this->email = "";
		$this->telefono = "";
		
	} 

	public function add(){//METODO PARA AÑADIR 
		$sql = "insert into cliente (tipo,nombre,nit_ced,contacto,email,telefono) ";
		$sql .= "value (
			\"$this->tipo\",
			\"$this->nombre\",
			\"$this->nit_ced\",
			\"$this->contacto\",
			\"$this->email\",
			\"$this->telefono\")";
		return Executor::doit($sql);
	}

	public static function delById($id){//METODO PARA ELIMINAR RECIBIENDO UN ID DE PARAMETRO
		$sql = "delete from ".self::$tablename." where id=$id";
		return	Executor::doit($sql);
	}
	public function del(){//ELIMINAR SIN NECESIDAD DE PARAMETROS
		$sql = "delete from ".self::$tablename." where id=$this->id";
		return	Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objeto ClienteData
	public function update(){//METODO PARA ACTUALIZAR LA INFORMACION
		$sql = "update cliente set 
		tipo='".$this->tipo."', 
		nombre='".$this->nombre."',
		nit_ced='".$this->nit_ced."',
		email='".$this->email."',
		contacto='".$this->contacto."'
		
		where id='".$this->id."'";
		return	Executor::doit($sql);
	}

	public static function getById($id){ //OBTENER UN OBJETO DE LA BASE DE DATOS Y CONVERTIRLO NUEVO EN UN OBJETO LOCAL, RECIBIENDO UN ID DE PARAMETRO 
		$sql = "select * from cliente where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClienteData());

	}

	public static function getByNitCC($id){ //OBTENER UN OBJETO DE LA BASE DE DATOS Y CONVERTIRLO NUEVO EN UN OBJETO LOCAL, RECIBIENDO UN ID DE PARAMETRO 
		$sql = "select * from cliente where nit_ced=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClienteData());

	}


	public static function getAll(){//OBTENERO UN ARREGLO DE TIPO CLIENTE CON TODOS LOS CLIENTES EXISTENTES EN LA BASE DE DATOS 
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClienteData());
	}

	
	public static function getLike($q){ //OBTENR DEPENDIENDO DE LO DIGITADO 
		$sql = "select * from ".self::$tablename." where nombre like '%$q%' or nit_ced like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClienteData());

	}


}

?>