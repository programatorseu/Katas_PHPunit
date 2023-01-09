<?php 
use App\PrimeFactors;
use PHPUnit\Framework\TestCase;
class PrimeFactorTest extends TestCase
{
    /** 
     * @test
     * @dataProvider dane
     *  */
    public function sprawdz_prime_factors($number, $expected) 
    {
        $factors = new PrimeFactors();
        $this->assertEquals($expected, $factors->generate($number));
    }

    public function dane() 
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [7, [7]],
            [8, [2, 2, 2]],
            [9, [3, 3]],
            [11, [11]],
            [12, [2, 2, 3]],
            [17, [17]],
            [100, [2, 2, 5, 5]]
        ];
    }

}