<?php 

require_once "connection.php";

class ModelUsers{

	/*========================================
	=            Mostrar usuarios            =
	========================================*/
	
	static public function mdlViewUsers($table, $item, $value, $item_, $value_){

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

	static public function mdlViewUsersTotal($table){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Mostrar usuarios  ======*/

	/*=======================================
	=            Agregar usuario            =
	=======================================*/
	
	static public function mdlCreateUser($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(suser, name, user, password, type_user, status, bdelete) VALUES (:suser, :name, :user, :password, :type_user, :status, :bdelete)");

		$stmt->bindParam(":suser", $data["suser"], PDO::PARAM_STR);
		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt->bindParam(":type_user", $data["type_user"], PDO::PARAM_STR);
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
	
	/*=====  End of Agregar usuario  ======*/
	
	/*======================================
	=            Editar usuario            =
	======================================*/
	
	static public function mdlEditUser($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, user = :user, password = :password,  type_user = :type_user WHERE suser = :suser");

		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt->bindParam(":type_user", $data["type_user"], PDO::PARAM_STR);
		$stmt->bindParam(":suser", $data["suser"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Editar usuario  ======*/
	
	/*==========================================
	=            Actualizar usuario            =
	==========================================*/
	
	static public function mdlUpdateUser($table, $item, $value, $item_, $value_){

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
	
	/*=====  End of Actualizar usuario  ======*/
	
	/*========================================
	=            Eliminar usuario            =
	========================================*/
	
	static public function mdlDeleteUser($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET user = :user, status = :status,  bdelete = :bdelete WHERE suser = :suser");

		$stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
		$stmt->bindParam(":bdelete", $data["bdelete"], PDO::PARAM_INT);
		$stmt->bindParam(":suser", $data["suser"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Connection::connect()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}
	
	/*=====  End of Eliminar usuario  ======*/
	
}
