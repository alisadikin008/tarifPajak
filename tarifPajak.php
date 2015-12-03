<?php
class pajak{
	public $incomeArray = array(0,50000000,250000000,500000000);
	public $taxArray = array(5/100,15/100,25/100,30/100);
	public $tax = 0;
	public $income = 0;
	public $finalTax = 0;
	public $prefix = 'Rp ';
	public function getTax($income){
		if($income > 0){
			if($income > $this->incomeArray[0] and $income <= $this->incomeArray[1]){
			$this->tax = $this->taxArray[0];
			$this->finalTax = number_format($income).' x '.$this->tax.' = '.$this->prefix.number_format($income * $this->tax);
			}elseif($income > $this->incomeArray[1] and $income <= $this->incomeArray[2]){
				$sisa = $income - $this->incomeArray[1];
				$this->finalTax = '('.number_format($this->incomeArray[1]).' x '.$this->taxArray[0].') + ('.number_format($sisa).' x '.$this->taxArray[1].')'.
					' = '.number_format($this->incomeArray[1] * $this->taxArray[0]).' + '.number_format($sisa * $this->taxArray[1]).
					' = '.$this->prefix.number_format((($this->incomeArray[1] * $this->taxArray[0]) + ($sisa * $this->taxArray[1])));
					 
			}elseif($income > $this->incomeArray[2] and $income <= $this->incomeArray[3]){	
				if($income - $incomeArray[2] > 0){
					$sisa = $income - $this->incomeArray[2]; 
				}	
				$this->finalTax = '('.number_format($this->incomeArray[1]).' x '.$this->taxArray[0].') + 
					('.number_format($this->incomeArray[2] - $this->incomeArray[1]).
					' x '.$this->taxArray[1].') + ('.number_format($sisa).' x '.$this->taxArray[2].')'.
					' = '.number_format($this->incomeArray[1] * $this->taxArray[0]).' + '.
					number_format(($this->incomeArray[2] - $this->incomeArray[1]) * $this->taxArray[1]).' + '.number_format($sisa * $this->taxArray[2]).
					' = '.$this->prefix.number_format((($this->incomeArray[1] * $this->taxArray[0]) + (($this->incomeArray[2] - $this->incomeArray[1]) * $this->taxArray[1]) + ($sisa * $this->taxArray[2])));
			}else{
				if($income - $incomeArray[3] > 0){
					$sisa = $income - $this->incomeArray[3];
					$selisih = $this->incomeArray[3] - $this->incomeArray[2]; 
				}
				$this->finalTax = '('.number_format($this->incomeArray[1]).' x '.$this->taxArray[0].') + 
					('.number_format($this->incomeArray[2] - $this->incomeArray[1]).
					' x '.$this->taxArray[1].') + ('.number_format($selisih).' x '.$this->taxArray[2].') + ('.number_format($sisa).' x '.$this->taxArray[3].')'.
					' = '.number_format($this->incomeArray[1] * $this->taxArray[0]).' + '.
					number_format(($this->incomeArray[2] - $this->incomeArray[1]) * $this->taxArray[1]).' + '.number_format($selisih * $this->taxArray[2]).' + '.number_format($sisa * $this->taxArray[3]).
					' = '.$this->prefix.number_format((($this->incomeArray[1] * $this->taxArray[0]) + (($this->incomeArray[2] - $this->incomeArray[1]) * $this->taxArray[1]) + ($selisih * $this->taxArray[2]) + ($sisa * $this->taxArray[3])));
			
			}
			return $this->finalTax;
		}else{
			return false;
		}
		
	}

	public function getFinalTax($income){
		return 'final tax of '.number_format($income).' is</br>-----------------------</br>'. $this->getTax($income);
	} 	
}

$finalPajak = new pajak();

#testhasil
$income =750000000;
echo $finalPajak->getFinalTax($income);