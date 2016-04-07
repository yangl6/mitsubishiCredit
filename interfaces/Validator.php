<?php
	interface Validator{
		//to return the price list of all credit cards or those credit cards that match certain criteria
		public function getCreditList($tranObjList);
		
		//return an array that has exceeded the threadhold $t with the creditList generated from function getCreditList
		public function checkFraud($creditList, $t); 
	}
?>