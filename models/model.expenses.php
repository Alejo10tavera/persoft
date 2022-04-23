<?php 

require_once "connection.php";

class ModelExpenses{

	/*========================================
	=            Mostrar egresos            =
	========================================*/
	
	static public function mdlViewExpenses($table, $item, $value, $item_, $value_){

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

	static public function mdlViewExpensesTotal($table){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Mostrar egresos  ======*/

	/*=======================================
	=            Agregar egreso            =
	=======================================*/
	
	static public function mdlCreateExpenses($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(sexpenses, date, icategory, iperson, reference, value, description, status, bdelete) VALUES (:sexpenses, :date, :icategory, :iperson, :reference, :value, :description, :status, :bdelete)");

		$stmt->bindParam(":sexpenses", $data["sexpenses"], PDO::PARAM_STR);
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
	
	/*=====  End of Agregar egreso  ======*/
	
	/*======================================
	=            Editar egreso            =
	======================================*/
	
	static public function mdlEditExpenses($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET date = :date, icategory = :icategory,  iperson = :iperson, reference = :reference, value = :value, description = :description WHERE sexpenses = :sexpenses");

		$stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);
		$stmt->bindParam(":icategory", $data["icategory"], PDO::PARAM_INT);
		$stmt->bindParam(":iperson", $data["iperson"], PDO::PARAM_INT);
		$stmt->bindParam(":reference", $data["reference"], PDO::PARAM_STR);
		$stmt->bindParam(":value", $data["value"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":sexpenses", $data["sexpenses"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Editar egreso  ======*/

	/*========================================
	=            Eliminar egreso            =
	========================================*/
	
	static public function mdlDeleteExpenses($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET status = :status,  bdelete = :bdelete WHERE sexpenses = :sexpenses");

		$stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
		$stmt->bindParam(":bdelete", $data["bdelete"], PDO::PARAM_INT);
		$stmt->bindParam(":sexpenses", $data["sexpenses"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Eliminar egreso  ======*/
	
	
}