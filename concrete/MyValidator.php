<?php
	include_once '../interfaces/Validator.php';
	
	class MyValidator implements Validator{
		
		//to return the credit list for today
		public function getCreditList($tranObjList){
			$creditList=array();
			for($i=0;$i<count($tranObjList);$i++){
				$tranObj=$tranObjList[$i];
				$hash=$tranObj->getHash();
				$time=$tranObj->getTime();
				$price=$tranObj->getPrice();
				
				if($hash==null || $time==null || $price==null){
					return -1;
				}
				
				
				if($this->checkToday($time)==true){
					if(isset($creditList[$hash])){
						$creditList[$hash]=$creditList[$hash]+$price;
					}
					else {
						$creditList[$hash]=$price;
					}
				}
				
			}
			
			return $creditList;
		}
		
		//to return an array that contains 
		public function checkFraud($creditList, $t){
			if($creditList==-1){
				return -1;
			}
				
			$ar=array();
			foreach($creditList as $k=>$v){
				if($t<$v){
					array_push($ar,$k);
				}
			}
			
			return $ar;
		}
		
		//to test if a time is within today
		private function checkToday($time){
			date_default_timezone_set("Australia/Melbourne");
			
			$todayDate=date("Y-m-d");
			$start="$todayDate 00:00:00";
			$sTime=strtotime($start);
			$end="$todayDate 23:59:59";
			$eTime=strtotime($end);
			
			
			
			$test=strtotime($time);
			
			
			if($test>=$sTime && $test<=$eTime){
				return true;
			}
			else{
				return false;
			}
		}
	}
?>