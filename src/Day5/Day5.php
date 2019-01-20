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
        $output = $this->removeAdjacentMatchingLetters($this->input);
        echo 'Part 1, output length: ' . strlen($output) . "\n\n";
        
        foreach (range('a', 'z') as $letter) {
            $input = str_ireplace($letter, '', $this->input);
            $currentStringLength = strlen($this->removeAdjacentMatchingLetters($input));
            
            if (isset($shortestStringLength) === false || $currentStringLength < $shortestStringLength) {
                $shortestStringLength = $currentStringLength;
            }
        }
        
        echo 'Part 2, output length: ' . $shortestStringLength . "\n";
    }

    private function removeAdjacentMatchingLetters(string $input)
    {
        do {
            $inputbeforeReplacement = $input;
            
            foreach (range('a', 'z') as $letter) {
                $letterUpperCase = strtoupper($letter);
                $input = str_replace(
                    [
                        $letter . $letterUpperCase,
                        $letterUpperCase . $letter
                    ],
                    '',
                    $input);
            }
        } while ($inputbeforeReplacement !== $input);
        
        return $input;
    }

    private function caseIsDifferent(string $match): bool
    {
        if (ctype_upper($match[0]) && ctype_lower($match[1])) {
            return true;
        }
        
        if (ctype_upper($match[1]) && ctype_lower($match[0])) {
            return true;
        }
        
        return false;
    }
}

$day5 = new Day5(File::createFromString('day5_input.txt'));
$day5->run();