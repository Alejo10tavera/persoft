<?php 

require_once "connection.php";

class ModelDebts{

	/*========================================
	=            Mostrar deudas              =
	========================================*/
	
	static public function mdlViewDebts($table, $item, $value, $item_, $value_){

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

	static public function mdlViewDebtsTotal($table){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Mostrar deudas    ======*/

	/*=====================================
	=            Agregar deuda            =
	=====================================*/
	
	static public function mdlCreateDebt($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(sdebt, date, icategory, iperson, value, description, quota, process, status, bdelete) VALUES (:sdebt, :date, :icategory, :iperson, :value, :description, :quota, :process, :status, :bdelete)");

		$stmt->bindParam(":sdebt", $data["sdebt"], PDO::PARAM_STR);
		$stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);
		$stmt->bindParam(":icategory", $data["icategory"], PDO::PARAM_STR);
		$stmt->bindParam(":iperson", $data["iperson"], PDO::PARAM_STR);
		$stmt->bindParam(":value", $data["value"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":quota", $data["quota"], PDO::PARAM_STR);
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
	
	/*=====  End of Agregar deuda  ======*/
	
	/*========================================
	=            Actualizar deuda            =
	========================================*/
	
	static public function mdlUpdateDebt($table, $item, $value, $item_, $value_){

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
	
	/*=====  End of Actualizar deuda  ======*/
	
	/*=======================================
	=            Finalizar deuda            =
	=======================================*/
	
	static public function mdlEndDebt($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET date_end = :date_end, process = :process WHERE sdebt = :sdebt");

		$stmt->bindParam(":date_end", $data["date_end"], PDO::PARAM_STR);
		$stmt->bindParam(":process", $data["process"], PDO::PARAM_STR);
		$stmt->bindParam(":sdebt", $data["sdebt"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Finalizar deuda  ======*/
	
	/*====================================
	=            Editar deuda            =
	====================================*/
	
	static public function mdlEditDebt($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET date = :date, icategory = :icategory,  iperson = :iperson, value = :value, description = :description, quota = :quota WHERE sdebt = :sdebt");

		$stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);
		$stmt->bindParam(":icategory", $data["icategory"], PDO::PARAM_INT);
		$stmt->bindParam(":iperson", $data["iperson"], PDO::PARAM_INT);
		$stmt->bindParam(":value", $data["value"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":quota", $data["quota"], PDO::PARAM_STR);
		$stmt->bindParam(":sdebt", $data["sdebt"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Editar deuda  ======*/

	/*======================================
	=            Eliminar deuda            =
	======================================*/
	
	static public function mdlDeleteDebt($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET date_end = :date_end, process = :process, status = :status,  bdelete = :bdelete WHERE sdebt = :sdebt");

		$stmt->bindParam(":process", $data["process"], PDO::PARAM_STR);
		$stmt->bindParam(":date_end", $data["date_end"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
		$stmt->bindParam(":bdelete", $data["bdelete"], PDO::PARAM_INT);
		$stmt->bindParam(":sdebt", $data["sdebt"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Eliminar deuda  ======*/
	
	
}