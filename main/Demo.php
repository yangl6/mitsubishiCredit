<?php
	include_once '../concrete/MyTransaction.php';
	include_once '../concrete/MyValidator.php';
	include_once '../Handlers/CreditHandler.php';
	include_once '../Handlers/ListHandler.php';
	include_once '../concrete/FormatPrinter.php';

	class Demo{
		public static function getFraudList($strAr,$T){
			$listHandler=new ListHandler();
			
			for($i=0;$i<count($strAr);$i++){
				$str=$strAr[$i];
				$tranObj=new MyTransaction($str);
				$listHandler->attach($tranObj);
				
			}
			
			$tranObjList=$listHandler->getList();
			
			$creditHandler=new CreditHandler(new MyValidator(), $tranObjList, $T);
			
			$fraudList=$creditHandler->getFraud();
			
			$printer=new FormatPrinter();
			$printer->printAr($fraudList);
			
			return $fraudList;
		}
		
	}
	
	
	
?>