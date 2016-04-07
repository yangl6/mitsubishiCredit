<?php
	include_once '../concrete/FormatPrinter.php';
	class TestFormatPrinter extends PHPUnit_Framework_TestCase{
		private $printer;
		
		public function __construct(){
			$this->printer=new FormatPrinter();
		}
		
		//to test if $ar=-1
		public function testMinus1(){
			$result=$this->printer->printAr(-1);
			$this->assertFalse($result);
		}
		
		
		//to test if $ar=null
		public function testNull(){
			$result=$this->printer->printAr(null);
			$this->assertFalse($result);
		}
		
		//to test if $ar has no value
		public function testNoValue(){
			$result=$this->printer->printAr(array());
			$this->assertFalse($result);
		}
		
		//to test if $ar is valid
		public function testValid(){
			$result=$this->printer->printAr(array(1,2,3));
			$this->assertTrue($result);
		}
	
	}
?>