<?php  

require_once '../../controllers/controller.lends.php';
require_once '../../models/model.lends.php';

class AjaxLends{

	# -----------  Activar desactivar prestamo  -----------

	public $sLendActive;
	public $statusLend;

	public function ajaxStatusLend(){

		$table = "lends";

		$item = "slend";
		$value = $this->sLendActive;

		$item_ = "status";
		$value_ = $this->statusLend;

		$response = ModelLends::mdlUpdateLend($table, $item, $value, $item_, $value_);

		echo $response;

	}

	# -----------  Finalizar prestamo  -----------

	public $sLendEnd;

	public function ajaxEndLend(){

		$response = ControllerLends::ctrEndLend($this->sLendEnd);

		echo $response;

	}

	# -----------  Edita prestamo  -----------

	public $sLendUpdate;

	public function ajaxViewLend(){

		$table = "lends";
		$item = "slend";
		$value = $this->sLendUpdate;
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerLends::ctrViewData($table, $item, $value, $item_, $value_);

		echo json_encode($response);

	}

	# -----------  Eliminar prestamo  -----------

	public $sLendDelete;

	public function ajaxDeleteLend(){

		$response = ControllerLends::ctrDeleteLend($this->sLendDelete);

		echo $response;

	}

}


# -----------  Activar desactivar prestamo  -----------

if(isset($_POST["statusLend"])){

	$stattusLend = new AjaxLends();
	$stattusLend -> sLendActive = $_POST["sLendActive"];
	$stattusLend -> statusLend = $_POST["statusLend"];
	$stattusLend -> ajaxStatusLend();

}

# -----------  Finalizar prestamo  -----------

if(isset($_POST["sLendEnd"])){

	$endLend = new AjaxLends();
	$endLend -> sLendEnd = $_POST["sLendEnd"];
	$endLend -> ajaxEndLend();

}

# -----------  Edita prestamo  -----------
if(isset($_POST["sLendUpdate"])){

	$editLend = new AjaxLends();
	$editLend -> sLendUpdate = $_POST["sLendUpdate"];
	$editLend -> ajaxViewLend();

}

# -----------  Eliminar prestamo  -----------

if(isset($_POST["sLendDelete"])){

	$deleteUser = new AjaxLends();
	$deleteUser -> sLendDelete = $_POST["sLendDelete"];
	$deleteUser -> ajaxDeleteLend();

}