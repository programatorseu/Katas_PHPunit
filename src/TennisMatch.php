<?php 
namespace App;

use PHPUnit\Framework\TestCase;

class TennisMatch 
{
    protected Player $playerOne;
    protected Player $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score(): string
    {
        if ($this->hasWinner()) {
            return 'Winner: '.$this->whoIsLeading()->name;
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: '.$this->whoIsLeading()->name;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            "%s-%s",
            $this->playerOne->convertPoints(),
            $this->playerTwo->convertPoints(),
        );
    }

    protected function whoIsLeading(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points
            ? $this->playerOne
            : $this->playerTwo;
    }
    protected function atLeast3(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
    protected function isDeuce(): bool
    {
        if (! $this->atLeast3()) {
            return false;
        }

        return $this->playerOne->points === $this->playerTwo->points;
    }

    protected function hasAdvantage(): bool
    {
        if (! $this->atLeast3()) {
            return false;
        }
        return ! $this->isDeuce();
    }

    protected function hasWinner(): bool
    {
        if ($this->playerOne->points < 4 && $this->playerTwo->points < 4) {
            return false;
        }

        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;
    }
    
}