<?php 

class ControllerPersons{

	/*===========================================
	=            Mostrar información            =
	===========================================*/
	
	static public function ctrViewData($table, $item, $value, $item_, $value_){

		$response = ModelPersons::mdlViewPersons($table, $item, $value, $item_, $value_);

		return $response;

	}
	
	/*=====  End of Mostrar información  ======*/

}