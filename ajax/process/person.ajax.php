<?php  

require_once '../../controllers/controller.persons.php';
require_once '../../models/model.persons.php';

class AjaxPerson{

	# -----------  Edita persona  -----------

	public $iPersonData;

	public function ajaxViewPerson(){

		$table = "persons";
		$item = "iperson";
		$value = $this->iPersonData;
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerPersons::ctrViewData($table, $item, $value, $item_, $value_);

		echo json_encode($response);

	}

	# -----------  Eliminar persona  -----------

	public $iUserDelete;

	public function ajaxDeleteUser(){

		$response = ControllerUsers::ctrDeleteUser($this->iUserDelete);

		echo $response;

	}

}

# -----------  Edita persona  -----------
if(isset($_POST["iPersonData"])){

	$editIncome = new AjaxPerson();
	$editIncome -> iPersonData = $_POST["iPersonData"];
	$editIncome -> ajaxViewPerson();

}

# -----------  Eliminar persona  -----------

/*=============================================
Eliminar Administrador
=============================================*/	

if(isset($_POST["iUserDelete"])){

	$deleteUser = new AjaxPerson();
	$deleteUser -> iUserDelete = $_POST["iUserDelete"];
	$deleteUser -> ajaxDeleteUser();

}