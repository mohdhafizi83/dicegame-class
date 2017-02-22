<?php

/**
 * @author Hafizi <mohdhafizi83@gmail.com>
 * @example http://mohdhafizi.projek.my/Dicegame.php Dicegame Demo.
 */
class Dicegame
{
    private $playerA    = array();
    private $playerB    = array();
    private $playerC    = array();
    private $playerD    = array();
    private $add_array_A;
    private $add_array_B;
    private $add_array_C;
    private $add_array_D;
    private $countA;
    private $countB;
    private $countC;
    private $countD;
    private $coundround = 1;

    Public function display_output()
    {
        foreach (range('A', 'D') as $i) {
            echo "Player $i:".implode(",", $this->{'player'.$i}).'<br>';
        }
    }

    public function throw_dice()
    {
        if ($this->coundround === 1) {
            for ($x = 0; $x <= 5; $x++) {
                foreach (range('A', 'D') as $i) {
                    $this->{'player'.$i}[] = rand(1, 6);
                }
            }
        } else {
            foreach (range('A', 'D') as $i) {
                $this->{'player'.$i} = array();
                for ($x = 0; $x < $this->{'count'.$i}; $x++) {
                    $this->{'player'.$i}[] = rand(1, 6);
                }
            }
        }


        echo "<h3>Round ".$this->coundround.':</h3><br>';
        echo '<u>After dice rolled:</u><br>';
        $this->display_output();
    }

    public function count_dice()
    {
        foreach (range('A', 'D') as $i) {
            $this->{'count'.$i} = count($this->{'player'.$i});
        }
    }

    public function add_dice($count, $alpha)
    {
        $this->{'add_array_'.$alpha} = array();
        for ($x = 0; $x < $count; $x++) {
            $this->{'add_array_'.$alpha}[] = '1';
        }
    }

    public function count_1top_dice()
    {
        foreach (range('A', 'D') as $i) {
            $counts = array_count_values($this->{'player'.$i});

            $count_1 = (isset($counts['1']) ? $counts['1'] : "0");

            if ($i == 'A') {
                $this->add_dice($count_1, 'B');
            } elseif ($i == 'B') {
                $this->add_dice($count_1, 'C');
            } elseif ($i == 'C') {
                $this->add_dice($count_1, 'D');
            } elseif ($i == 'D') {
                $this->add_dice($count_1, 'A');
            }
        }
    }

    public function remove_dice()
    {
        $array_to_remove = array('1', '6');
        foreach (range('A', 'D') as $i) {
            $this->{'player'.$i} = array_diff($this->{'player'.$i},
                $array_to_remove);
        }
    }

    public function move_dice()
    {
        foreach (range('A', 'D') as $i) {
            $this->{'player'.$i} = array_merge($this->{'player'.$i},
                $this->{'add_array_'.$i});
        }
        echo '<u>After dice moved/removed:</u><br>';
        $this->display_output();
    }

    public function roll_dice()
    {
        $this->throw_dice();
        $this->count_1top_dice();
        $this->remove_dice();
        $this->move_dice();
        $this->count_dice();
    }

    public function let_roll_dice()
    {

        $this->roll_dice();

        while (!empty($this->countA) && !empty($this->countB) && !empty($this->countC)
        && !empty($this->countD)) {
            // loop with process
            $this->coundround = $this->coundround + 1;
            $this->roll_dice();
        }

        //somebody win

        foreach (range('A', 'D') as $i) {
            if (empty($this->{'count'.$i})) {
                echo "<h2><span style=\"color: #CC0000\">Player $i WIN!</span></h2>";
            }
        }
    }
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

$myclass = new Dicegame();
$myclass->let_roll_dice();
