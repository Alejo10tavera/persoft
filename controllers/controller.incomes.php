<?php 

class ControllerIncomes{

	/*===========================================
	=            Mostrar información            =
	===========================================*/
	
	static public function ctrViewData($table, $item, $value, $item_, $value_){

		$response = ModelIncomes::mdlViewIncomes($table, $item, $value, $item_, $value_);

		return $response;

	}
	
	/*=====  End of Mostrar información  ======*/

	/*=======================================
	=            Agregar ingreso            =
	=======================================*/
	
	static public function ctrCreateIncome(){

		if(isset($_POST['addReference'])){

			if(preg_match('/^[-\\_\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addReference"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["addValue"]) &&
			   preg_match('/^[\/\=\\&\\$\\;\\_\\|\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addDescription"])){

			   	$table = "incomes";

			   	$responseTotal = ModelIncomes::mdlViewIncomesTotal($table);

			   	$sincome = str_pad(count($responseTotal) + 1, 4, '0', STR_PAD_LEFT);

			   	$data = array("sincome" => $sincome,
							  "date" => $_POST["addDate"],
							  "icategory" =>  $_POST["addCategory"],
							  "iperson" =>  $_POST["addPerson"],
							  "reference" =>  $_POST["addReference"],
							  "value" =>  $_POST["addValue"],
							  "description" =>  $_POST["addDescription"],
							  "status" => 1,
							  "bdelete" => 0);

			   	$response = ModelIncomes::mdlCreateIncome($table, $data);
				
				if($response == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El ingreso ha sido creado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "incomes";
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
	
	/*=====  End of Agregar ingreso  ======*/
	
	/*======================================
	=            Editar ingreso            =
	======================================*/
	
	static public function ctrEditIncome(){

		if(isset($_POST['editCode'])){

			if(preg_match('/^[-\\_\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editReference"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editValue"]) &&
			   preg_match('/^[\/\=\\&\\$\\;\\_\\|\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"])){

			   	$table = "incomes";

			   	$data = array("sincome" => $_POST["editCode"],
							  "date" => $_POST["editDate"],
							  "icategory" =>  $_POST["editCategory"],
							  "iperson" =>  $_POST["editPerson"],
							  "reference" =>  $_POST["editReference"],
							  "value" =>  $_POST["editValue"],
							  "description" =>  $_POST["editDescription"]);

			   	$response = ModelIncomes::mdlEditIncome($table, $data);
				
				if($response == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El ingreso ha sido creado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "incomes";
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
	
	/*=====  End of Editar ingreso  ======*/
	
	/*========================================
	=            Eliminar ingreso            =
	========================================*/
	
	static public function ctrDeleteIncome($sincome){

		$table = "incomes";

		$data = array("sincome" => $sincome,
					  "status" =>  0,
					  "bdelete" =>  1);

		$response = ModelIncomes::mdlDeleteIncome($table, $data);

		return $response;

	}
	
	/*=====  End of Eliminar ingreso  ======*/
	
}