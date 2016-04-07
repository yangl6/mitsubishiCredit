<?php
	include_once '../interfaces/Transaction.php';
	
	class ListHandler{
		private $tranObjList;
		
		public function __construct(){
			$this->tranObjList=array();
		}
		
		//to add a new transaction into the array
		public function attach($obj){
			array_push($this->tranObjList, $obj);
		}
		
		//to remove the last transaction from the array
		public function remove($obj){
			$lastIndex=count($this->tranObjList)-1;
			unset($this->tranObjList[$lastIndex]);
		}
		
		//to get the list
		public function getList(){
			return $this->tranObjList;
		}
	}
	
	
?>