<?php
	abstract class Transaction{
		
		protected $hash;
		protected $time;
		protected $price;
		
		public function __construct($str){
			$this->getElement($str);
		}
		
		//to separate the input string into several elements, including hash number, transaction time and price
		abstract public function getElement($str);
		
		public function getHash(){
			return $this->hash;
		}
		
		public function getTime(){
			return $this->time;
		}
		
		public function getPrice(){
			return $this->price;
		}
	}
?>