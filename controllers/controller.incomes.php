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

}