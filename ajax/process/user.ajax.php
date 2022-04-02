<?php  

require_once '../../controllers/controller.users.php';
require_once '../../models/model.users.php';

class AjaxUsers{

	# -----------  Validar que usuario no este repetido  -----------

	public $validateUser;

	public function ajaxValidateUser(){

		$table = "users";
		$item = "user";
		$value = $this->validateUser;
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerUsers::ctrViewData($table, $item, $value, $item_, $value_);

		echo json_encode($response);

	}

	# -----------  Activar desactivar usuario  -----------

	public $sUserActive;
	public $statusUser;

	public function ajaxStatusUser(){

		$table = "users";

		$item = "suser";
		$value = $this->sUserActive;

		$item_ = "status";
		$value_ = $this->statusUser;

		$response = ModelUsers::mdlUpdateUser($table, $item, $value, $item_, $value_);

		echo $response;

	}

	# -----------  Edita usuario  -----------

	public $sUserEdit;

	public function ajaxViewUser(){

		$table = "users";
		$item = "suser";
		$value = $this->sUserEdit;
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerUsers::ctrViewData($table, $item, $value, $item_, $value_);

		echo json_encode($response);

	}

	# -----------  Eliminar usuario  -----------

	public $iUserDelete;

	public function ajaxDeleteUser(){

		$response = ControllerUsers::ctrDeleteUser($this->iUserDelete);

		echo $response;

	}

}

# -----------  Validar que usuario no este repetido  -----------

if(isset($_POST["validateUser"])){

	$valueUser = new AjaxUsers();
	$valueUser -> validateUser = $_POST["validateUser"];
	$valueUser -> ajaxValidateUser();

}

# -----------  Activar desactivar usuario  -----------

if(isset($_POST["statusUser"])){

	$stattusUsers = new AjaxUsers();
	$stattusUsers -> sUserActive = $_POST["sUserActive"];
	$stattusUsers -> statusUser = $_POST["statusUser"];
	$stattusUsers -> ajaxStatusUser();

}

# -----------  Edita usuario  -----------
if(isset($_POST["sUserEdit"])){

	$editUser = new AjaxUsers();
	$editUser -> sUserEdit = $_POST["sUserEdit"];
	$editUser -> ajaxViewUser();

}

# -----------  Eliminar usuario  -----------

/*=============================================
Eliminar Administrador
=============================================*/	

if(isset($_POST["iUserDelete"])){

	$deleteUser = new AjaxUsers();
	$deleteUser -> iUserDelete = $_POST["iUserDelete"];
	$deleteUser -> ajaxDeleteUser();

}