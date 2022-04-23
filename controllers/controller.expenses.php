<?php 

class ControllerExpenses{

	/*===========================================
	=            Mostrar información            =
	===========================================*/
	
	static public function ctrViewData($table, $item, $value, $item_, $value_){

		$response = ModelExpenses::mdlViewExpenses($table, $item, $value, $item_, $value_);

		return $response;

	}
	
	/*=====  End of Mostrar información  ======*/

	/*=======================================
	=            Agregar egreso            =
	=======================================*/
	
	static public function ctrCreateExpenses(){

		if(isset($_POST['addReference'])){

			if(preg_match('/^[-\\_\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addReference"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["addValue"]) &&
			   preg_match('/^[\/\=\\&\\$\\;\\_\\|\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addDescription"])){

			   	$table = "expenses";

			   	$responseTotal = ModelExpenses::mdlViewExpensesTotal($table);

			   	$sexpenses = str_pad(count($responseTotal) + 1, 4, '0', STR_PAD_LEFT);

			   	$data = array("sexpenses" => $sexpenses,
							  "date" => $_POST["addDate"],
							  "icategory" =>  $_POST["addCategory"],
							  "iperson" =>  $_POST["addPerson"],
							  "reference" =>  $_POST["addReference"],
							  "value" =>  $_POST["addValue"],
							  "description" =>  $_POST["addDescription"],
							  "status" => 1,
							  "bdelete" => 0);

			   	$response = ModelExpenses::mdlCreateExpenses($table, $data);
				
				if($response == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El egreso ha sido creado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "expenses";
								} 
						});

					</script>';

				}

			}else{

				echo '<script>

					swal({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten caracteres especiales en ninguno de los campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							history.back();

						}

					});	

				</script>';

			}

		}

	}
	
	/*=====  End of Agregar egreso  ======*/
	
	/*======================================
	=            Editar egreso            =
	======================================*/
	
	static public function ctrEditExpenses(){

		if(isset($_POST['editCode'])){

			if(preg_match('/^[-\\_\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editReference"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editValue"]) &&
			   preg_match('/^[\/\=\\&\\$\\;\\_\\|\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"])){

			   	$table = "expenses";

			   	$data = array("sexpenses" => $_POST["editCode"],
							  "date" => $_POST["editDate"],
							  "icategory" =>  $_POST["editCategory"],
							  "iperson" =>  $_POST["editPerson"],
							  "reference" =>  $_POST["editReference"],
							  "value" =>  $_POST["editValue"],
							  "description" =>  $_POST["editDescription"]);

			   	$response = ModelExpenses::mdlEditExpenses($table, $data);
				
				if($response == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El egreso ha sido creado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "expenses";
								} 
						});

					</script>';

				}

			}else{

				echo '<script>

					swal({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten caracteres especiales en ninguno de los campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							history.back();

						}

					});	

				</script>';

			}

		}

	}
	
	/*=====  End of Editar egreso  ======*/
	
	/*========================================
	=            Eliminar egreso            =
	========================================*/
	
	static public function ctrDeleteExpenses($sexpenses){

		$table = "expenses";

		$data = array("sexpenses" => $sexpenses,
					  "status" =>  0,
					  "bdelete" =>  1);

		$response = ModelExpenses::mdlDeleteExpenses($table, $data);

		return $response;

	}
	
	/*=====  End of Eliminar egreso  ======*/
	
}