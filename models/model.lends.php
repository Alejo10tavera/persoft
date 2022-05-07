<?php 

require_once "connection.php";

class ModelLends{

	/*========================================
	=            Mostrar prestamos              =
	========================================*/
	
	static public function mdlViewLends($table, $item, $value, $item_, $value_){

		if($item != null && $value != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item AND $item_ = :$item_");

			$stmt->bindParam(":".$item, $value, PDO::PARAM_STR);
			$stmt->bindParam(":".$item_, $value_, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item_ = :$item_");

			$stmt->bindParam(":".$item_, $value_, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

	static public function mdlViewLendsTotal($table){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Mostrar prestamos    ======*/

	/*=====================================
	=            Agregar prestamo            =
	=====================================*/
	
	static public function mdlCreateLend($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(slend, date, icategory, iperson, value, description, process, status, bdelete) VALUES (:slend, :date, :icategory, :iperson, :value, :description, :process, :status, :bdelete)");

		$stmt->bindParam(":slend", $data["slend"], PDO::PARAM_STR);
		$stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);
		$stmt->bindParam(":icategory", $data["icategory"], PDO::PARAM_STR);
		$stmt->bindParam(":iperson", $data["iperson"], PDO::PARAM_STR);
		$stmt->bindParam(":value", $data["value"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":process", $data["process"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $data["status"], PDO::PARAM_STR);
		$stmt->bindParam(":bdelete", $data["bdelete"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}
	
	/*=====  End of Agregar prestamo  ======*/
	
	/*========================================
	=            Actualizar prestamo            =
	========================================*/
	
	static public function mdlUpdateLend($table, $item, $value, $item_, $value_){

		$stmt = Connection::connect()->prepare("UPDATE $table SET $item_ = :$item_ WHERE $item = :$item");

		$stmt -> bindParam(":".$item_, $value_, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;

	}
	
	/*=====  End of Actualizar prestamo  ======*/
	
	/*=======================================
	=            Finalizar prestamo            =
	=======================================*/
	
	static public function mdlEndLend($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET date_end = :date_end, process = :process WHERE slend = :slend");

		$stmt->bindParam(":date_end", $data["date_end"], PDO::PARAM_STR);
		$stmt->bindParam(":process", $data["process"], PDO::PARAM_STR);
		$stmt->bindParam(":slend", $data["slend"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Finalizar prestamo  ======*/
	
	/*====================================
	=            Editar prestamo            =
	====================================*/
	
	static public function mdlEditLend($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET date = :date, icategory = :icategory,  iperson = :iperson, value = :value, description = :description WHERE slend = :slend");

		$stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);
		$stmt->bindParam(":icategory", $data["icategory"], PDO::PARAM_INT);
		$stmt->bindParam(":iperson", $data["iperson"], PDO::PARAM_INT);
		$stmt->bindParam(":value", $data["value"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":slend", $data["slend"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Editar prestamo  ======*/

	/*======================================
	=            Eliminar prestamo            =
	======================================*/
	
	static public function mdlDeleteLend($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET date_end = :date_end, process = :process, status = :status,  bdelete = :bdelete WHERE slend = :slend");

		$stmt->bindParam(":process", $data["process"], PDO::PARAM_STR);
		$stmt->bindParam(":date_end", $data["date_end"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
		$stmt->bindParam(":bdelete", $data["bdelete"], PDO::PARAM_INT);
		$stmt->bindParam(":slend", $data["slend"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Eliminar prestamo  ======*/
	
	
}