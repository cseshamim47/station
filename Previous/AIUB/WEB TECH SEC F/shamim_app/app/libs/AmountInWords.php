<?php

	
	class AmountInWords  {
		
		
		public function inWords($amount,$precession, $major, $minor){
			$amt = explode(".",number_format($amount,$precession,'.',''));
			if(count($amt)>1 && $amt[1]>0)	
				return $this->inTaka($amt[0], $major)." ".$this->inPaisa($amt[1], $minor);
			else
				return $this->inTaka($amt[0], $major);
		}
		
		private function inTaka($amount, $major){
		
		$strreturn = "";
		$amountkeyvalone = array(1=>"One",2=>"Two",3=>"Three",4=>"Four",5=>"Five",6=>"Six",7=>"Seven",8=>"Eight",9=>"Nine");
		$amountkeyvalteen = array(10=>"Ten",11=>"Eleven",12=>"Twelve",13=>"Thirteen",14=>"Fourteen",15=>"Fifteen",16=>"Sixteen",17=>"Seventeen",18=>"Eighteen",19=>"Nineteen");
		$amountkeyvalten = array(0=>"",2=>"Twenty",3=>"Thirty",4=>"Forty",5=>"Fifty",6=>"Sixty",7=>"Seventy",8=>"Eighty",9=>"Ninety");
		
		
			$crore = 0;
			$lak = 0;
			$thou = 0;
			$hund = 0;
			$tens = 0;
			$ones = 0;
			
			
			$amt=$amount;			
			$crore = floor($amt/10000000);
			$amt -= $crore*10000000;
			$lak = floor($amt/100000);
			$amt -= $lak*100000;
			$thou = floor($amt/1000);
			$amt -= $thou*1000;	
			$hund = floor($amt/100);
			$amt -= $hund*100;
			$tens = $amt;
			$ones = $amt%10;

			if($crore!=0){
					$i = 0;
					if(strlen($crore)==1){
						$crores = $amountkeyvalone[$crore];	
					} 
					if(strlen($crore)==2){
						foreach($amountkeyvalteen as $key=>$val){	
							if(substr($crore,0,2)==$key){
								$i = 1;
								$crores = $amountkeyvalteen[substr($crore,0,2)];
							}
						}
						if($i != 1){
							if(substr($crore,1,1)!="0"){
									$crores = $crore.$amountkeyvalten[substr($crore,0,1)]." ".$amountkeyvalone[substr($crore,1,1)];
							}else{
									$crores = $crore.$amountkeyvalten[substr($crore,0,1)];
								}
						}											
					
					}
				$strreturn = $crores." Crore ";		
			}
			
			if($lak!=0){
					$i = 0;
					if(strlen($lak)==1){
						$laks = $amountkeyvalone[$lak];	
					} 
					if(strlen($lak)==2){
						foreach($amountkeyvalteen as $key=>$val){	
							if(substr($lak,0,2)==$key){
								$i = 1;
								$laks = $amountkeyvalteen[substr($lak,0,2)];
							}
						}
						if($i != 1){
							if(substr($lak,1,1)!="0")
									$laks = $amountkeyvalten[substr($lak,0,1)]." ".$amountkeyvalone[substr($lak,1,1)];
								else{
									$laks = $amountkeyvalten[substr($lak,0,1)];
								}
						}											
					
					}
				$strreturn .= $laks." Lac ";		
			}
			if($thou!=0){ 
					$i = 0;
					if(strlen($thou)==1){
						$thous = $amountkeyvalone[$thou];	
					} 
					if(strlen($thou)==2){
						foreach($amountkeyvalteen as $key=>$val){	
							if(substr($thou,0,2)==$key){
								$i = 1;
								$thous = $amountkeyvalteen[substr($thou,0,2)];
							}
						}
						if($i != 1){
							if(substr($thou,1,1)!="0")
									$thous = $amountkeyvalten[substr($thou,0,1)]." ".$amountkeyvalone[substr($thou,1,1)];
								else{
									$thous = $amountkeyvalten[substr($thou,0,1)];
								}
						}											
					
					}
				$strreturn .= $thous." Thousand ";	echo $strreturn; die;
			}
			if($hund!=0){
				$hunds = $amountkeyvalone[$hund];
				$strreturn .= $hunds." Hundred ";	
			}			
			if($tens!=0){
				$ten = "";
				$i=0;
				if(strlen($tens)==1){
						$ten = $amountkeyvalone[$tens];	
					}
				if(strlen($tens)==2){		
				foreach($amountkeyvalteen as $key=>$val){	
							if(substr($tens,0,2)==$key){
								$i = 1;
								$ten = $amountkeyvalteen[substr($tens,0,2)];
							}
						}
						if($i != 1){  
							if(substr($tens,1,1)!="0"){ 
									$ten = $amountkeyvalten[substr($tens,0,1)]." ".$amountkeyvalone[substr($tens,1,1)];
							}else{
									$ten = $amountkeyvalten[substr($tens,0,1)];
								}
						}
				}
				$strreturn .= $ten;			
			}
				
			if($strreturn=="")
				$strreturn = $amountkeyvalten[$ones]; 

			return $strreturn." ".$major;	
		}

	private function inPaisa($amount, $minor){
		
		$strreturn = "";
		$amountkeyvalone = array(1=>"One",2=>"Two",3=>"Three",4=>"Four",5=>"Five",6=>"Six",7=>"Seven",8=>"Eight",9=>"Nine");
		$amountkeyvalteen = array(10=>"Ten",11=>"Eleven",12=>"Twelve",13=>"Thirteen",14=>"Fourteen",15=>"Fifteen",16=>"Sixteen",17=>"Seventeen",18=>"Eighteen",19=>"Nineteen");
		$amountkeyvalten = array(0=>"",2=>"Twenty",3=>"Thirty",4=>"Forty",5=>"Fifty",6=>"Sixty",7=>"Seventy",8=>"Eighty",9=>"Ninety");
		
		
			$crore = 0;
			$lak = 0;
			$thou = 0;
			$hund = 0;
			$tens = 0;
			$ones = 0;
			
			
			$amt=$amount;			//echo $amt; die;
			$crore = floor($amt/10000000);
			$amt -= $crore*10000000;
			$lak = floor($amt/100000);
			$amt -= $lak*100000;
			$thou = floor($amt/1000);
			$amt -= $thou*1000;	
			$hund = floor($amt/100);
			$amt -= $hund*100;
			$tens = $amt;
			$ones = $amt%10;

			if($crore!=0){
					$i = 0;
					if(strlen($crore)==1){
						$crores = $amountkeyvalone[$crore];	
					} 
					if(strlen($crore)==2){
						foreach($amountkeyvalteen as $key=>$val){	
							if(substr($crore,0,2)==$key){
								$i = 1;
								$crores = $amountkeyvalteen[substr($crore,0,2)];
							}
						}
						if($i != 1){
							if(substr($crore,1,1)!="0"){
									$crores = $crore.$amountkeyvalten[substr($crore,0,1)]." ".$amountkeyvalone[substr($crore,1,1)];
							}else{
									$crores = $crore.$amountkeyvalten[substr($crore,0,1)];
								}
						}											
					
					}
				$strreturn = $crores." Crore ";		
			}
			
			if($lak!=0){
					$i = 0;
					if(strlen($lak)==1){
						$laks = $amountkeyvalone[$lak];	
					} 
					if(strlen($lak)==2){
						foreach($amountkeyvalteen as $key=>$val){	
							if(substr($lak,0,2)==$key){
								$i = 1;
								$laks = $amountkeyvalteen[substr($lak,0,2)];
							}
						}
						if($i != 1){
							if(substr($lak,1,1)!="0")
									$laks = $amountkeyvalten[substr($lak,0,1)]." ".$amountkeyvalone[substr($lak,1,1)];
								else{
									$laks = $amountkeyvalten[substr($lak,0,1)];
								}
						}											
					
					}
				$strreturn .= $laks." Lac ";		
			}
			if($thou!=0){
					$i = 0;
					if(strlen($thou)==1){
						$thous = $amountkeyvalone[$thou];	
					} 
					if(strlen($thou)==2){
						foreach($amountkeyvalteen as $key=>$val){	
							if(substr($thou,0,2)==$key){
								$i = 1;
								$thous = $amountkeyvalteen[substr($thou,0,2)];
							}
						}
						if($i != 1){
							if(substr($thou,1,1)!="0")
									$thous = $amountkeyvalten[substr($thou,0,1)]." ".$amountkeyvalone[substr($thou,1,1)];
								else{
									$thous = $amountkeyvalten[substr($thou,0,1)];
								}
						}											
					
					}
				$strreturn .= $thous." Thousand ";		
			}
			if($hund!=0){
				$hunds = $amountkeyvalone[$hund];
				$strreturn .= $hunds." Hundred ";	
			}			
			if($tens!=0){
				$i=0;
				if(strlen($tens)==1){
						$ten = $amountkeyvalone[$tens];	
					}
				if(strlen($tens)==2){		
				foreach($amountkeyvalteen as $key=>$val){	
							if(substr($tens,0,2)==$key){
								$i = 1;
								$ten = $amountkeyvalteen[substr($tens,0,2)];
							}
						}
						if($i != 1){  
							if(substr($tens,1,1)!="0"){ 
									$ten = $amountkeyvalten[substr($tens,0,1)]." ".$amountkeyvalone[substr($tens,1,1)];
							}else{
									$ten = $amountkeyvalten[substr($tens,0,1)];
								}
						}
				}
				$strreturn .= $ten;			
			}
				
			if($strreturn=="")
				$strreturn = $amountkeyvalten[$ones];

			return " And ".$strreturn." ".$minor;	
		}
}



