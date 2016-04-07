<?php 
	include_once '../concrete/MyTransaction.php';
	
	class TestTransaction extends PHPUnit_Framework_TestCase{
		//to test if getting element is successful with a valid input
		public function testGetElementValid(){
			$tran=new MyTransaction("b74c05dd1ef7d81a838d20c45c773c04,2016-04-07 13:15:54,3.00");
			$hash=$tran->getHash();
			$time=$tran->getTime();
			$price=$tran->getPrice();
			
			$this->assertEquals("b74c05dd1ef7d81a838d20c45c773c04",$hash);
			$this->assertEquals("2016-04-07 13:15:54",$time);
			$this->assertEquals("3.00",$price);
		}
		
		//to test if element getting returns false
		public function testGetElmentInvalid(){
			$tran=new MyTransaction("b74c05dd1ef7d81a838d20c45c773c042016-04-07 13:15:543.00");
			$hash=$tran->getHash();
			$time=$tran->getTime();
			$price=$tran->getPrice();
			
			$this->assertEquals(null,$hash);
			$this->assertEquals(null,$time);
			$this->assertEquals(null,$price);
		}
		
		
		
	}
?>