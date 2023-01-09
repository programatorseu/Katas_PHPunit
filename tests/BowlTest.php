<?php 
use App\Game;
use PHPUnit\Framework\TestCase;
class BowlTest extends TestCase
{
    /** @test */
    public function it_scores_0() 
    {
        $game = new Game();
        foreach(range(1,20) as $rzut) {
            $game->roll(0);
        } 
        $this->assertSame(0, $game->score());
    }

        /** @test */
        public function it_scores_1() 
        {
            $game = new Game();
            foreach(range(1,20) as $rzut) {
                $game->roll(1);
            } 
            $this->assertSame(20, $game->score());
        }

        /** @test */
        public function it_has_spare_bonus() 
        {
            $game = new Game();
            $game->roll(5);
            $game->roll(5);
            $game->roll(8);
            foreach(range(1, 17) as $roll) {
                $game->roll(0);
            }
            $this->assertSame(26, $game->score());
        }
        /** @test */
        public function it_awards_2_rolls_bonus_as_strike() 
        {
            $game = new Game();
            $game->roll(10); // strike
            $game->roll(5);
            $game->roll(2);
    
            foreach (range(1, 16) as $roll) {
                $game->roll(0);
            }
    
            $this->assertSame(24, $game->score());
        }

          /** @test */
    function a_spare_on_the_final_frame_grants_one_extra_ball()
    {
        $game = new Game();
        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }
        $game->roll(5);
        $game->roll(5); // spare

        $game->roll(5);

        $this->assertSame(15, $game->score());
    }

    /** @test */
    function a_strike_on_the_final_frame_grants_two_extra_balls()
    {
        $game = new Game();

        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        $game->roll(10); // strike

        $game->roll(10);
        $game->roll(10);

        $this->assertSame(30, $game->score());
    }

    /** @test */
    function it_scores_a_perfect_game()
    {
        $game = new Game();

        foreach (range(1, 12) as $roll) {
            $game->roll(10);
        }

        $this->assertSame(300, $game->score());
    }
}