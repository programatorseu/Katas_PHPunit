PHPunit katas
https://osherove.com/
- Prime Numbers
- Roman Numerals
-  Bowling
- String Calc
```php
    public function add($nums) 
    {
        if(! $nums) {
            return 0;
        }
        $nums = preg_split("/,|\n/", $nums);
        foreach($nums as $num) {
            if($num < 0) {
                throw new \Exception("Liczba negatywna");
            }
        }
        return array_sum($nums);
    }
```

