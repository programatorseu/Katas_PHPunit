<?php

use App\TennisMatch;
use App\Player;

use PHPUnit\Framework\TestCase;
class TennisMatchTest extends TestCase
{

    /** @test 
     * @dataProvider scores
    */
    public function it_scores_during_game($playerOnePoints, $playerTwoPoints, $score) 
    {
        $match = new TennisMatch(
            $player1 = new Player('Piotr'),
            $player2 = new Player('Anna'),
        );
        for($i= 0; $i < $playerOnePoints; $i++) {
            $player1->score();
        }
        for($i = 0; $i < $playerTwoPoints; $i++) {
            $player2->score();
        }
        $this->assertEquals($score, $match->score());
    }

    public function scores() 
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [3, 0, 'forty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 3, 'deuce'],
            [4, 4, 'deuce'],
            [5, 5, 'deuce'],
            [4, 3, 'Advantage: Piotr'],
            [3, 4, 'Advantage: Anna'],
            [4, 0, 'Winner: Piotr'],
            [0, 4, 'Winner: Anna'],
        ];
    }
}