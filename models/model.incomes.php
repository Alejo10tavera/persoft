<?php 

require_once "connection.php";

class ModelIncomes{

	/*========================================
	=            Mostrar ingresos            =
	========================================*/
	
	static public function mdlViewIncomes($table, $item, $value, $item_, $value_){

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

	static public function mdlViewIncomesTotal($table){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Mostrar ingresos  ======*/

	/*=======================================
	=            Agregar ingreso            =
	=======================================*/
	
	static public function mdlCreateIncome($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(sincome, date, icategory, iperson, reference, value, description, status, bdelete) VALUES (:sincome, :date, :icategory, :iperson, :reference, :value, :description, :status, :bdelete)");

		$stmt->bindParam(":sincome", $data["sincome"], PDO::PARAM_STR);
		$stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);
		$stmt->bindParam(":icategory", $data["icategory"], PDO::PARAM_STR);
		$stmt->bindParam(":iperson", $data["iperson"], PDO::PARAM_STR);
		$stmt->bindParam(":reference", $data["reference"], PDO::PARAM_STR);
		$stmt->bindParam(":value", $data["value"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
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
	
	/*=====  End of Agregar ingreso  ======*/
	
	/*======================================
	=            Editar ingreso            =
	======================================*/
	
	static public function mdlEditIncome($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET date = :date, icategory = :icategory,  iperson = :iperson, reference = :reference, value = :value, description = :description WHERE sincome = :sincome");

		$stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);
		$stmt->bindParam(":icategory", $data["icategory"], PDO::PARAM_INT);
		$stmt->bindParam(":iperson", $data["iperson"], PDO::PARAM_INT);
		$stmt->bindParam(":reference", $data["reference"], PDO::PARAM_STR);
		$stmt->bindParam(":value", $data["value"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":sincome", $data["sincome"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Editar ingreso  ======*/

	/*========================================
	=            Eliminar ingreso            =
	========================================*/
	
	static public function mdlDeleteIncome($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET status = :status,  bdelete = :bdelete WHERE sincome = :sincome");

		$stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
		$stmt->bindParam(":bdelete", $data["bdelete"], PDO::PARAM_INT);
		$stmt->bindParam(":sincome", $data["sincome"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Eliminar ingreso  ======*/
	
	
}