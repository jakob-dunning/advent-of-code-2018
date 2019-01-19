<?php
declare(strict_types = 1);
namespace Aoc2018\Day5;

include ('../../vendor/autoload.php');

use Aoc2018\Day;
use Aoc2018\ValueObject\File;

class Day5 extends Day
{

    public function run()
    {
    }
}

$day5 = new Day5(File::createFromString('day5_input.txt'));
$day5->run();