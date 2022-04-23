<?php  

require_once '../../controllers/controller.debts.php';
require_once '../../models/model.debts.php';

require_once '../../controllers/controller.categories.php';
require_once '../../models/model.categories.php';

require_once '../../controllers/controller.persons.php';
require_once '../../models/model.persons.php';


class TableDebts{

	# -----------  Tabla de usuarios  -----------
	public function viewTable(){

		$table = "debts";
		$item = "";
		$value = "";
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerDebts::ctrViewData($table, $item, $value, $item_, $value_);

		if(count($response) == 0){

			$dataJson = '{"data":[]}';

			echo $dataJson;

			return;

		}


		$dataJson = '{
	
			"data":[';

				for($i = 0; $i < count($response); $i++){

					/*=====  Categoria  ======*/

					$table = "categories";
					$item = "icategory";
					$value = $response[$i]["icategory"];
					$item_ = "bdelete";
					$value_ = 0;

					$responseCategory = ControllerCategories::ctrViewData($table, $item, $value, $item_, $value_);

					if($responseCategory["name"] == ""){

						$category = "Sin Categoría";
					
					}else{

						$category = $responseCategory["name"];

					}

					/*=====  Tercero  ======*/

					$table = "persons";
					$item = "iperson";
					$value = $response[$i]["iperson"];
					$item_ = "bdelete";
					$value_ = 0;

					$responsePerson = ControllerPersons::ctrViewData($table, $item, $value, $item_, $value_);

					if($responsePerson["name"] == ""){

						$person = "Sin Tercero";
					
					}else{

						$person = $responsePerson["name"];

					}

					/*=====  Proceso de la deuda  ======*/

					if($response[$i]["process"] == 0){

						$process = "<span class='shadow-none badge badge-danger'>Finalizado</span>";

					}else{

						$process = "<span class='shadow-none badge badge-primary'>Habilitado</span>";

					}

					/*=====  Estado de la deuda  ======*/

					if($response[$i]["process"] == 1){

						if($response[$i]["status"] == 0){

							$status = "<button class='btn btn-dark btn-sm btnActivate' statusDebt='1' sDebt='".$response[$i]["sdebt"]."'>Inactivo</button>";

						}else{

							$status = "<button class='btn btn-success btn-sm btnActivate' statusDebt='0' sDebt='".$response[$i]["sdebt"]."'>Activo</button>";
						}

					}else{

						$status = "<span class='shadow-none badge badge-danger'>Finalizado</span>";

					}

					/*=====  Acciones ======*/

					$actions = "<ul class='table-controls'><li><button type='button' class='btn btn-outline-info btn-rounded btn-sm mb-2 mr-2 endDebt' sdebt='".$response[$i]["sdebt"]."'><i class='far fa-money-bill-alt'></i></button></li><li><button type='button' class='btn btn-outline-warning btn-rounded btn-sm mb-2 mr-2 editDebt' data-toggle='modal' data-target='.modal-edit-debt' sdebt='".$response[$i]["sdebt"]."'><i class='far fa-edit'></i></button></li><li><button type='button' class='btn btn-outline-danger btn-rounded btn-sm mb-2 mr-2 deleteDebt' sdebt='".$response[$i]["sdebt"]."'><i class='far fa-trash-alt'></i></button></li></ul>";
					
					$dataJson .='[

						"'.($i+1).'",
						"'.$response[$i]["sdebt"].'",
						"'.$response[$i]["date"].'",
						"'.$category.'",
						"'.$person.'",
						"'.number_format($response[$i]["value"],2,",",".").'",
						"'.$response[$i]["description"].'",
						"'.$response[$i]["quota"].'",
						"'.$process.'",
						"'.$response[$i]["date_end"].'",
						"'.$status.'",
						"'.$actions.'"

					],';

				}

				$dataJson = substr($dataJson, 0, -1);

			$dataJson .= ']}';

		echo $dataJson;
		
	}

}

# -----------  Tabla de usuarios  -----------
$table = new TableDebts();
$table -> viewTable();