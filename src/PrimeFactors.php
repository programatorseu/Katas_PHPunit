<?php 
namespace App;
class PrimeFactors
{
    public function generate($num) 
    {
        $factors = [];
        $divisor = 2;
        while($num > 1) {
            while($num % $divisor === 0) {
                $factors[] = $divisor;
                $num = $num / $divisor;
            }
            $divisor++;
        }
        return $factors;
    }
}