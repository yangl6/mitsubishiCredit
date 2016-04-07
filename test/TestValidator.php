<?php
	include_once '../concrete/MyValidator.php';
	include_once '../Handlers/ListHandler.php';
	include_once '../concrete/MyTransaction.php';
	
	class TestValidator extends PHPUnit_Framework_TestCase{
		private $validator;
		
		public function __construct(){
			$this->validator=new MyValidator();
		}
		
		
		//to test if the getCreditList can have expected values
		public function testCreditListValid(){
			$strAr=array("b74c05dd1ef7d81a838d20c45c773c04,2016-04-08 13:15:54,3.00","b74c05dd1ef7d81a838d20c45c773c05,2016-04-08 16:15:54,15.00",
						
					"b74c05dd1ef7d81a838d20c45c773c09,2016-04-07 16:15:54,15.00","b74c05dd1ef7d81a838d20c45c773c04,2016-04-08 13:15:54,6.00");
			
			$listHandler=new ListHandler();
				
			for($i=0;$i<count($strAr);$i++){
				$str=$strAr[$i];
				$tranObj=new MyTransaction($str);
				$listHandler->attach($tranObj);
			
			}
			
			$tranObjList=$listHandler->getList();
				
			$creditList=$this->validator->getCreditList($tranObjList);
			
			$expected=array("b74c05dd1ef7d81a838d20c45c773c04"=>9,"b74c05dd1ef7d81a838d20c45c773c05"=>15.00);
			
			$this->assertTrue($this->arrays_are_similar($expected, $creditList));
			
		}
		
		
		//to test if the getCreditList can have expected values
		public function testCreditListInValid(){
			$strAr=array("b74c05dd1ef7d81a838d20c45c773c04,2016-04-08 13:15:54,3.00","b74c05dd1ef7d81a838d20c45c773c05,2016-04-08 16:15:54,15.00",
		
					"b74c05dd1ef7d81a838d20c45c773c09,2016-04-07 16:15:5415.00","b74c05dd1ef7d81a838d20c45c773c04,2016-04-08 13:15:546.00");
				
			$listHandler=new ListHandler();
		
			for($i=0;$i<count($strAr);$i++){
				$str=$strAr[$i];
				$tranObj=new MyTransaction($str);
				$listHandler->attach($tranObj);
					
			}
				
			$tranObjList=$listHandler->getList();
		
			$creditList=$this->validator->getCreditList($tranObjList);
				
			$expected=-1;
				
			$this->assertEquals($expected,$creditList);
				
		}
		
		//to test if the getCreditList can be empty if none of those transactions are made today
		public function testCreditListEmpty(){
			$strAr=array("b74c05dd1ef7d81a838d20c45c773c04,2016-04-07 13:15:54,3.00","b74c05dd1ef7d81a838d20c45c773c05,2016-04-07 16:15:54,15.00",
			
					"b74c05dd1ef7d81a838d20c45c773c09,2016-04-07 16:15:54,15.00","b74c05dd1ef7d81a838d20c45c773c04,2016-04-07 13:15:54,6.00");
			
			$listHandler=new ListHandler();
			
			for($i=0;$i<count($strAr);$i++){
				$str=$strAr[$i];
				$tranObj=new MyTransaction($str);
				$listHandler->attach($tranObj);
					
			}
			
			$tranObjList=$listHandler->getList();
			
			$creditList=$this->validator->getCreditList($tranObjList);
			
			$this->assertTrue(count($creditList)==0);
			
			
		}
		
		
		//to test if checkFraud indeed returns -1 if the input was invalid
		public function testCheckFraudInvalid(){
			$creditList=-1;
			
			$t=10;
			
			$this->assertEquals(-1,$this->validator->checkFraud($creditList, $t));
		}
		
		//to test if two arrays are similar
		private function arrays_are_similar($a, $b) {
			// if the indexes don't match, return immediately
			if (count($a)!=count($b)) {
				return false;
			}
			
			// we know that the indexes, but maybe not values, match.
			// compare the values between the two arrays
			foreach($a as $k => $v) {
				if ($v != $b[$k]) {
					return false;
				}
			}
			// we have identical indexes, and no unequal values
			return true;
		}
	}