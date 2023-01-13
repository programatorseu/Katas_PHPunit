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

Tennis Match
1) game won by first player who have at least 4 points in total and at lest 2 more than the oponent

2) 0- => love

​	fifteen => 1

​	thirty => 2

​	forty => 3

```
1-0
fifteen - love
2-0 thirty - love

```

3. if at least 3 points have been scored by each player and scores equal = `deuce`
4. if at least 3 poinst scored by each player and player 1 has more than player 2 then it is advantage

test:

```php