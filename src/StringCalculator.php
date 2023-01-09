<?php 
namespace App;
class StringCalculator 
{
    protected string $delimiter = ",|\n";
    public function add($nums) 
    {
        $this->disallowNegatives($nums = $this->parseString($nums));
        $nums = array_filter($nums, function($num) {
            return $num <= 1000;
        });
        return array_sum($nums);
    }

    protected function parseString(string $numbers): array
    {
        $customDelimiter = '\/\/(.)\n';
        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }
        return preg_split("/{$this->delimiter}/", $numbers);
    }
    protected function disallowNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new \Exception('Negative numbers are disallowed.');
            }
        }
    }

}