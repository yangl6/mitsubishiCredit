<?php
	include_once '../interfaces/Transaction.php';
	
	class MyTransaction extends Transaction{
		
		//the constructor that implements its parent constructor
		public function __construct($str){
			parent::__construct($str);
		}
		
		public function getElement($str){
			$eleAr=preg_split("/[,]+/", $str);
			
			if(count($eleAr)!=3){
				$this->hash=null;
				$this->time=null;
				$this->price=null;
				return false;
			}
			
			$this->hash=$eleAr[0];
			$this->time=$eleAr[1];
			$this->price=$eleAr[2];
			return $eleAr;
		}
	}
?>