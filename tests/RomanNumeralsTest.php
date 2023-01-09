<?php 
use App\PrimeFactors;
use App\RomanNumerals;

use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /** @test */
    public function it_cannot_generates_num_less_than_1() 
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }
    /** @test 
     * @dataProvider checks
    */
    public function it_generates_the_roman_for_num($arabic, $roman) 
    {
        $this->assertEquals($roman, RomanNumerals::generate($arabic));
    }
    public function checks() 
    {
 return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [3999, 'MMMCMXCIX']
        ];
    }


}