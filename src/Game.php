<?php 
namespace App;

  class Game 
  {
    
    const FRAMES_PER_GAME = 10;

    protected array $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }
    public function score()
    {
        $score = 0;
        $roll = 0;
        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->howManyPins($roll) + $this->strikeBonus($roll);
                $roll += 1;
                continue;
            }
            $score += $this->defaultScore($roll);
            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);
            }
            $roll += 2;
        }

        return $score;
    }

    /**
     * Determine if the current roll was a strike.
     *
     * @param  int  $roll
     * @return bool
     */
    protected function isStrike(int $roll): bool
    {
        return $this->howManyPins($roll) === 10;
    }

    /**
     * Determine if the current frame was a spare.
     *
     * @param  int  $roll
     * @return bool
     */
    protected function isSpare(int $roll): bool
    {
        return $this->defaultScore($roll) === 10;
    }


    protected function defaultScore(int $roll): int
    {
        return $this->howManyPins($roll) + $this->howManyPins($roll + 1);
    }


    protected function strikeBonus(int $roll): int
    {
        return $this->howManyPins($roll + 1) + $this->howManyPins($roll + 2);
    }


    protected function spareBonus(int $roll): int
    {
        return $this->howManyPins($roll + 2);
    }


    protected function howManyPins(int $roll): int
    {
        return $this->rolls[$roll];
    }
  }