<?php 
namespace App;
class FizzBuzz {

public static function getOutput(int $number)
{
    $result = !($number % 3) ? 'fizz' : '';
    $result .= !($number % 5) ? 'buzz' : '';
    $result = empty($result) ? $number : $result;
    return $result;
}


}