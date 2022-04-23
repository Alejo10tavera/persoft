<?php  

require_once '../../controllers/controller.incomes.php';
require_once '../../models/model.incomes.php';

class AjaxIncomes{

	# -----------  Edita ingreso  -----------

	public $sIncomeEdit;

	public function ajaxViewIncome(){

		$table = "incomes";
		$item = "sincome";
		$value = $this->sIncomeEdit;
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerIncomes::ctrViewData($table, $item, $value, $item_, $value_);

		echo json_encode($response);

	}

	# -----------  Eliminar ingreso  -----------

	public $iIncomeDelete;

	public function ajaxDeleteIncome(){

		$response = ControllerIncomes::ctrDeleteIncome($this->iIncomeDelete);

		echo $response;

	}

}

# -----------  Edita ingreso  -----------
if(isset($_POST["sIncomeEdit"])){

	$editIncome = new AjaxIncomes();
	$editIncome -> sIncomeEdit = $_POST["sIncomeEdit"];
	$editIncome -> ajaxViewIncome();

}

# -----------  Eliminar ingreso  -----------

/*=============================================
Eliminar Administrador
=============================================*/	

if(isset($_POST["iIncomeDelete"])){

	$deleteIncome = new AjaxIncomes();
	$deleteIncome -> iIncomeDelete = $_POST["iIncomeDelete"];
	$deleteIncome -> ajaxDeleteIncome();

}