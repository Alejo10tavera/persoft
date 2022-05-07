<?php 

class ControllerLends{

	/*===========================================
	=            Mostrar información            =
	===========================================*/
	
	static public function ctrViewData($table, $item, $value, $item_, $value_){

		$response = ModelLends::mdlViewLends($table, $item, $value, $item_, $value_);

		return $response;

	}
	
	/*=====  End of Mostrar información  ======*/

	/*=====================================
	=            Agregar deuda            =
	=====================================*/
	
	static public function ctrCreateLend(){

		if(isset($_POST['addDate'])){

			if(preg_match('/^[-\\_\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addDate"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["addValue"]) &&
			   preg_match('/^[\/\=\\&\\$\\;\\_\\|\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addDescription"])){

			   	$table = "lends";

			   	$responseTotal = ModelLends::mdlViewLendsTotal($table);

			   	$slend = str_pad(count($responseTotal) + 1, 4, '0', STR_PAD_LEFT);

			   	$data = array("slend" => $slend,
							  "date" => $_POST["addDate"],
							  "icategory" =>  $_POST["addCategory"],
							  "iperson" =>  $_POST["addPerson"],
							  "value" =>  $_POST["addValue"],
							  "description" =>  $_POST["addDescription"],
							  "process" => 1,
							  "status" => 1,
							  "bdelete" => 0);

			   	$response = ModelLends::mdlCreateLend($table, $data);
				
				if($response == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El préstamo ha sido creado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "lends";
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
	
	/*=====  End of Agregar deuda  ======*/

	/*=======================================
	=            Finalizar deuda            =
	=======================================*/
	
	static public function ctrEndLend($slend){

		$table = "lends";

		$date = date('Y-m-d');

		$data = array("slend" => $slend,
					  "date_end" => $date,
					  "process" =>  0);

		$response = ModelLends::mdlEndLend($table, $data);

		return $response;

	}
	
	/*=====  End of Finalizar deuda  ======*/
	
	/*====================================
	=            Editar deuda            =
	====================================*/
	
	static public function ctrEditLend(){

		if(isset($_POST['editCode'])){

			if(preg_match('/^[-\\_\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDate"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editValue"]) &&
			   preg_match('/^[\/\=\\&\\$\\;\\_\\|\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"])){

			   	$table = "lends";

			   	$data = array("slend" => $_POST['editCode'],
							  "date" => $_POST["editDate"],
							  "icategory" =>  $_POST["editCategory"],
							  "iperson" =>  $_POST["editPerson"],
							  "value" =>  $_POST["editValue"],
							  "description" =>  $_POST["editDescription"]);

			   	$response = ModelLends::mdlEditLend($table, $data);
				
				if($response == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "La deuda ha sido editada correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "lends";
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
	
	/*=====  End of Editar deuda  ======*/
	
	/*====================================
	=            Borrar deuda            =
	====================================*/
	
	static public function ctrDeleteLend($slend){

		$table = "lends";

		$date = date('Y-m-d');

		$data = array("slend" => $slend,
					  "date_end" => $date,
					  "process" =>  0,
					  "status" =>  0,
					  "bdelete" =>  1);

		$response = ModelLends::mdlDeleteLend($table, $data);

		return $response;

	}
	
	/*=====  End of Borrar deuda  ======*/
	
}