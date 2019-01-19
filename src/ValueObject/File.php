<?php
declare(strict_types = 1);
namespace Aoc2018\ValueObject;

class File
{

    private $path;

    private function __construct(string $path)
    {
        $this->ensureFileExists($path);
        
        $this->path = $path;
    }

    public static function createFromString(string $path): self
    {
        return new self($path);
    }

    private function ensureFileExists(string $path): void
    {
        if (file_exists($path) === false) {
            throw new \Exception('File does not exist: ' . $path);
        }
    }

    public function getPath(): string
    {
        return $this->path;
    }
}

