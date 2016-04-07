<?php
	include_once '../interfaces/Printer.php';
	
	class FormatPrinter implements printer{
		public function printAr($ar){
			if($ar==-1){
				echo "Please make sure your input is valid";
				return false;
			}
			
			if(count($ar)==0){
				echo "There is no fraud credit card for today";
				return false;
			}
			
			
			
			for($i=0;$i<count($ar);$i++){
				$index=$i+1;
				echo "Fraudent Credit Card $index:  ".$ar[$i]."\n";
			}
			return true;
		}
	}
?>