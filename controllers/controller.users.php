<?php 

class ControllerUsers{

	/*===========================================
	=            Ingreso de usuarios            =
	===========================================*/
	
	static public function ctrLogin(){

		if(isset($_POST['ingUsername'])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsername"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   	$encrypt = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			   	$table = "users";
			   	$item = "user";
				$value = $_POST["ingUsername"];
				$item_ = "bdelete";
				$value_ = 0;
				
				$response = ModelUsers::mdlViewUsers($table, $item, $value, $item_, $value_);

				if($response["user"] == $_POST["ingUsername"] && $response["password"] == $encrypt){

					if($response["status"] == 1){

						$_SESSION["validationSession"] = "ok";
				 		$_SESSION["user"] = $response["suser"];

				 		echo '<script>

							window.location = "dashboard-v1";

				 		</script>';

					}else{

						echo "<div class='alert alert-danger mt-3 small'>ERROR: El usuario está desactivado</div>";

					}

				}else{

					echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";

				}

			}else{

				echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";

			}

		}

	}
	
	/*=====  End of Ingreso de usuarios  ======*/
	
	/*===========================================
	=            Mostrar información            =
	===========================================*/
	
	static public function ctrViewData($table, $item, $value, $item_, $value_){

		$response = ModelUsers::mdlViewUsers($table, $item, $value, $item_, $value_);

		return $response;

	}
	
	/*=====  End of Mostrar información  ======*/

	/*=====================================
	=            Crear usuario            =
	=====================================*/
	
	static public function ctrCreateUser(){

		if(isset($_POST["addName"])){

			if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["addName"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["addUser"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["addPassword"])){

			   	$table = "users";

			   	$responseTotal = ModelUsers::mdlViewUsersTotal($table);

			   	$suser = str_pad(count($responseTotal) + 1, 4, '0', STR_PAD_LEFT);

			   	$encrypt = crypt($_POST["addPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$data = array("suser" => $suser,
							  "name" => $_POST["addName"],
							  "user" =>  $_POST["addUser"],
							  "password" => $encrypt,
							  "type_user" => $_POST["addProfile"],
							  "status" => 0,
							  "bdelete" => 0);
				
				$response = ModelUsers::mdlCreateUser($table, $data);
				
				if($response == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El usuario ha sido creado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "users";
								} 
						});

					</script>';

				}

			}else{

				echo'<script>

						swal({
								type:"error",
							  	title: "¡ERROR!",
							  	text: "No se permiten caracteres especiales en el registro",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "users";
								  } 
						});

					</script>';

			}

		}

	}
	
	/*=====  End of Crear usuario  ======*/
	
	/*======================================
	=            Editar usuario            =
	======================================*/
	
	static public function ctrEditUser(){

		if(isset($_POST["editCode"])){

			if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["editName"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editUser"])){

			   	$table = "users";

			    if($_POST["editPassword"] != ""){

			   		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editPassword"])){

			   			$encrypt = crypt($_POST["editPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');			

			   		}else{

			   			echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";

			   			return;

			   		}

			   	}else{

			   		$encrypt = $_POST["existingPassword"];

			   	}		   	

				$data = array("suser" => $_POST["editCode"],
							  "name" => $_POST["editName"],
							  "user" =>  $_POST["editUser"],
							  "password" => $encrypt,
							  "type_user" => $_POST["editProfile"]);
				
				$response = ModelUsers::mdlEditUser($table, $data);
				
				if($response == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El usuario ha sido editado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "users";
								} 
						});

					</script>';

				}

			}else{

				echo'<script>

						swal({
								type:"error",
							  	title: "¡ERROR!",
							  	text: "No se permiten caracteres especiales en la edición",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "users";
								  } 
						});

					</script>';

			}

		}

	}
	
	/*=====  End of Editar usuario  ======*/

	/*=============================================
	=            Eliminar administador            =
	=============================================*/
	
	static public function ctrDeleteUser($suser){

		$table = "users";

		$data = array("suser" => $suser,
					  "user" =>  "-----",
					  "status" =>  0,
					  "bdelete" =>  1);

		$response = ModelUsers::mdlDeleteUser($table, $data);

		return $response;

	}
	
	/*=====  End of Eliminar administador  ======*/
	
}