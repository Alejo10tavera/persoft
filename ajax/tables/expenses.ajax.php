<?php  

require_once '../../controllers/controller.expenses.php';
require_once '../../models/model.expenses.php';

require_once '../../controllers/controller.categories.php';
require_once '../../models/model.categories.php';

require_once '../../controllers/controller.persons.php';
require_once '../../models/model.persons.php';


class TableExpenses{

	# -----------  Tabla de usuarios  -----------
	public function viewTable(){

		$table = "expenses";
		$item = "";
		$value = "";
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerExpenses::ctrViewData($table, $item, $value, $item_, $value_);

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

					/*=====  Acciones ======*/

					$actions = "<ul class='table-controls'><li><button type='button' class='btn btn-outline-warning btn-rounded btn-sm mb-2 mr-2 editExpense' data-toggle='modal' data-target='.modal-edit-expense' sexpenses='".$response[$i]["sexpenses"]."'><i class='far fa-edit'></i></button></li><li><button type='button' class='btn btn-outline-danger btn-rounded btn-sm mb-2 mr-2 deleteExpenses' sexpenses='".$response[$i]["sexpenses"]."'><i class='far fa-trash-alt'></i></button></li></ul>";
					
					$dataJson .='[

						"'.($i+1).'",
						"'.$response[$i]["sexpenses"].'",
						"'.$response[$i]["reference"].'",
						"'.$response[$i]["date"].'",
						"'.$category.'",
						"'.$person.'",
						"'.number_format($response[$i]["value"],2,",",".").'",
						"'.$response[$i]["description"].'",
						"'.$actions.'"

					],';

				}

				$dataJson = substr($dataJson, 0, -1);

			$dataJson .= ']}';

		echo $dataJson;
		
	}

}

# -----------  Tabla de usuarios  -----------
$table = new TableExpenses();
$table -> viewTable();