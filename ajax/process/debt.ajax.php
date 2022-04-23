<?php  

require_once '../../controllers/controller.debts.php';
require_once '../../models/model.debts.php';

class AjaxDebts{

	# -----------  Activar desactivar deuda  -----------

	public $sDebtActive;
	public $statusDebt;

	public function ajaxStatusDebt(){

		$table = "debts";

		$item = "sdebt";
		$value = $this->sDebtActive;

		$item_ = "status";
		$value_ = $this->statusDebt;

		$response = ModelDebts::mdlUpdateDebt($table, $item, $value, $item_, $value_);

		echo $response;

	}

	# -----------  Finalizar deuda  -----------

	public $sDebtEnd;

	public function ajaxEndDebt(){

		$response = ControllerDebts::ctrEndDebt($this->sDebtEnd);

		echo $response;

	}

	# -----------  Edita deuda  -----------

	public $sDebtUpdate;

	public function ajaxViewDebt(){

		$table = "debts";
		$item = "sdebt";
		$value = $this->sDebtUpdate;
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerDebts::ctrViewData($table, $item, $value, $item_, $value_);

		echo json_encode($response);

	}

	# -----------  Eliminar deuda  -----------

	public $iDebtDelete;

	public function ajaxDeleteDebt(){

		$response = ControllerDebts::ctrDeleteDebt($this->iDebtDelete);

		echo $response;

	}

}


# -----------  Activar desactivar deuda  -----------

if(isset($_POST["statusDebt"])){

	$stattusDebt = new AjaxDebts();
	$stattusDebt -> sDebtActive = $_POST["sDebtActive"];
	$stattusDebt -> statusDebt = $_POST["statusDebt"];
	$stattusDebt -> ajaxStatusDebt();

}

# -----------  Finalizar deuda  -----------

if(isset($_POST["sDebtEnd"])){

	$endDebt = new AjaxDebts();
	$endDebt -> sDebtEnd = $_POST["sDebtEnd"];
	$endDebt -> ajaxEndDebt();

}

# -----------  Edita deuda  -----------
if(isset($_POST["sDebtUpdate"])){

	$editDebt = new AjaxDebts();
	$editDebt -> sDebtUpdate = $_POST["sDebtUpdate"];
	$editDebt -> ajaxViewDebt();

}

# -----------  Eliminar deuda  -----------

if(isset($_POST["iDebtDelete"])){

	$deleteUser = new AjaxDebts();
	$deleteUser -> iDebtDelete = $_POST["iDebtDelete"];
	$deleteUser -> ajaxDeleteDebt();

}