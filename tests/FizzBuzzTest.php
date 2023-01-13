<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /** @test */
    public function returns_fizz_for_three() 
    {
        foreach ([3, 6, 9, 12] as $number) {
            $this->assertEquals('fizz', FizzBuzz::getOutput($number));
        }
    }

      /** @test */
      function returns_buzz_for_five()
      {
          foreach ([5, 10, 20, 25] as $number) {
              $this->assertEquals('buzz', FizzBuzz::getOutput($number));
          }
      }
   /** @test */
   function return_original_number()
   {
       foreach ([1, 2, 4, 7, 8, 11] as $number) {
            $this->assertEquals($number, FizzBuzz::getOutput($number));
        }
   }

     /** @test */
     function return_three_and_five()
     {
         foreach ([15, 30, 45, 60] as $number) {
             $this->assertEquals('fizzbuzz', FizzBuzz::getOutput($number));
         }
     }
 
}