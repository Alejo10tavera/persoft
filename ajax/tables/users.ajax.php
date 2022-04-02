<?php  

require_once '../../controllers/controller.users.php';
require_once '../../models/model.users.php';

class TableUser{

	# -----------  Tabla de usuarios  -----------
	public function viewTable(){

		$table = "users";
		$item = "";
		$value = "";
		$item_ = "bdelete";
		$value_ = 0;

		$response = ControllerUsers::ctrViewData($table, $item, $value, $item_, $value_);

		if(count($response) == 0){

			$dataJson = '{"data":[]}';

			echo $dataJson;

			return;

		}


		$dataJson = '{
	
			"data":[';

				foreach ($response as $key => $value) {

					/*=====  Estado del usuario  ======*/
					
					if($value["suser"] != 1){

						if($value["status"] == 0){

							$status = "<button class='btn btn-dark btn-sm btnActivate' statusUser='1' sUser='".$value["suser"]."'>Inactivo</button>";

						}else{

							$status = "<button class='btn btn-success btn-sm btnActivate' statusUser='0' sUser='".$value["suser"]."'>Activo</button>";
						}

					}else{

						$status = "<button class='btn btn-info btn-sm'>Activado</button>";
						
					}

					/*=====  Perfil del usuario  ======*/

					switch ($value["type_user"]) {
						case '1':
							$profile = "Administrador";
							break;

						case '2':
							$profile = "Especial";
							break;

					}

					/*=====  Acciones ======*/

					$actions = "<ul class='table-controls'><li><button type='button' class='btn btn-outline-warning btn-rounded btn-sm mb-2 mr-2 editUser' data-toggle='modal' data-target='.modal-edit-user' suser='".$value["suser"]."'><i class='far fa-edit'></i></button></li><li><button type='button' class='btn btn-outline-danger btn-rounded btn-sm mb-2 mr-2 deleteUser' suser='".$value["suser"]."'><i class='far fa-trash-alt'></i></button></li></ul>";
					
					$dataJson .='[

						"'.($key+1).'",
						"'.$value["suser"].'",
						"'.$value["name"].'",
						"'.$value["user"].'",
						"'.$profile.'",
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
$table = new TableUser();
$table -> viewTable();