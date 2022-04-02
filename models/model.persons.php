<?php 

require_once "connection.php";

class ModelPersons{

	/*========================================
	=            Mostrar personas            =
	========================================*/
	
	static public function mdlViewPersons($table, $item, $value, $item_, $value_){

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

	static public function mdlViewPersonsTotal($table){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Mostrar personas  ======*/

}