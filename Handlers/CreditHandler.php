<?php
	include_once '../interfaces/Validator.php';
	include_once '../interfaces/Transaction.php';
	
	
	class CreditHandler{
		
		private $validator;
		private $tranObjList;
		private $t;
		
		public function __construct($v,$tObj,$t){
			$this->validator=$v;
			$this->tranObjList=$tObj;
			$this->t=$t;
		}
		
		//to return the list of fraud credit cards as an array
		public function getFraud(){
			$creditList=$this->validator->getCreditList($this->tranObjList);
			$fraudList=$this->validator->checkFraud($creditList,$this->t);
			return $fraudList;
		}
		
	}
?>