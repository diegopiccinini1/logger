<?php

use function PHPUnit\Framework\fileExists;

require_once 'Logger.php';

class FileLogger extends Logger
{

    private string $path;

    public function __construct(string $path)
    {

        if (file_exists($path) && !is_readable($path)) throw new \RuntimeException("File non leggibile");
        if (file_exists($path) && !is_writable($path)) throw new \RuntimeException("File non scrivibile");
        $this->path = $path;
    }

    public function write(Log $log)
    {
        file_put_contents($this->path, $log->toString(). "\n", FILE_APPEND);
    }

    public function read()
    {
        return explode("\n", file_get_contents($this->path));
    }

    public function clean()
    {
        if (file_exists($this->path)) unlink($this->path);
    }
}
