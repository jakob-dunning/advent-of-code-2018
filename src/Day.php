<?php
declare(strict_types = 1);
namespace Aoc2018;

use Aoc2018\ValueObject\File;

abstract class Day
{

    protected $input;

    public function __construct(File $file)
    {
        $this->input = $this->fetchInputFromFile($file);
    }

    public abstract function run();

    private function fetchInputFromFile(File $file): string
    {
        return file_get_contents($file->getPath());
    }
}