<?php 
use App\StringCalculator;
use PHPUnit\Framework\TestCase;
class StringCalculatorTest  extends TestCase
{
    /** @test */
    public function empty_string_as_0() 
    {
        $calc = new StringCalculator();
        $this->assertEquals(0, $calc->add(''));
    }
    /** @test */
    public function sum_of_single() 
    {
        $calc = new StringCalculator();
        $this->assertSame(4, $calc->add('4'));
    }
    /** @test */
    public function sum_of_two() 
    {
        $calc = new StringCalculator();
        $this->assertSame(8, $calc->add('4,4'));
    }
    /** @test */
    public function sum_of_many() 
    {
        $calc =  new StringCalculator();
        $this->assertSame(15, $calc->add('5,5,5'));
    }
    /** @test */
    public function new_line_as_delimeter() 
    {
        $calc = new StringCalculator();
        $this->assertSame(12, $calc->add("6\n6"));
    }
    /** @test */
    public function negative_number_throws_exception() 
    {
        $calc = new StringCalculator();
        $this->expectException(\Exception::class);
        $calc->add('5, -3');
    }
    /** @test */
    public function more_than_1000_ignored() 
    {
        $calc = new StringCalculator();
        $this->assertEquals(1, $calc->add('1, 10001'));
    }
    /** @test */
    public function custom_delimeters() 
    {
        $calc = new StringCalculator();
        $this->assertEquals(9, $calc->add("//:\n5:4"));
    }
}