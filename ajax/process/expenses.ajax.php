<?php  

require_once '../../controllers/controller.expenses.php';
require_once '../../models/model.expenses.php';

class AjaxExpenses{

	# -----------  Edita egreso  -----------

	public $sExpensesEdit;

	public function ajaxViewExpenses(){

		$table = "expenses";
		$item = "sexpenses";
		$value = $this->sExpensesEdit;
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerExpenses::ctrViewData($table, $item, $value, $item_, $value_);

		echo json_encode($response);

	}

	# -----------  Eliminar egreso  -----------

	public $iExpensesDelete;

	public function ajaxDeleteExpenses(){

		$response = ControllerExpenses::ctrDeleteExpenses($this->iExpensesDelete);

		echo $response;

	}

}

# -----------  Edita egreso  -----------
if(isset($_POST["sExpensesEdit"])){

	$editExpenses = new AjaxExpenses();
	$editExpenses -> sExpensesEdit = $_POST["sExpensesEdit"];
	$editExpenses -> ajaxViewExpenses();

}

# -----------  Eliminar egreso  -----------

if(isset($_POST["iExpensesDelete"])){

	$deleteExpenses = new AjaxExpenses();
	$deleteExpenses -> iExpensesDelete = $_POST["iExpensesDelete"];
	$deleteExpenses -> ajaxDeleteExpenses();

}