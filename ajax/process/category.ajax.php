<?php  

require_once '../../controllers/controller.categories.php';
require_once '../../models/model.categories.php';

class AjaxCategory{

	# -----------  Edita persona  -----------

	public $iCategoryData;

	public function ajaxViewCategory(){

		$table = "categories";
		$item = "icategory";
		$value = $this->iCategoryData;
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerCategories::ctrViewData($table, $item, $value, $item_, $value_);

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
if(isset($_POST["iCategoryData"])){

	$editIncome = new AjaxCategory();
	$editIncome -> iCategoryData = $_POST["iCategoryData"];
	$editIncome -> ajaxViewCategory();

}

# -----------  Eliminar persona  -----------

/*=============================================
Eliminar Administrador
=============================================*/	

if(isset($_POST["iUserDelete"])){

	$deleteUser = new AjaxCategory();
	$deleteUser -> iUserDelete = $_POST["iUserDelete"];
	$deleteUser -> ajaxDeleteUser();

}