<?php

abstract class Logger{

    abstract function write(Log $log);

    abstract function read();

    abstract function clean();

}

class Log
{
    const DEBUG = 0;
    const ERROR = 1;
    const WARNING = 2;
    const INFO = 3;
    const VERBOSE = 4;

    private $tag = "";
    private $msg = "";
    private $type = 4;
    private $datetime;

    public function __construct(string $tag, string $msg, int $type)
    {
        $this->tag = $tag;
        $this->msg = $msg;
        switch ($type) {
            case 0:
                $type = "DEBUG";
                break;
            case 1:
                $type = "ERROR";
                break;
            case 2:
                $type = "WARNING";
                break;
            case 3:
                $type = "INFO";
                break;
            default:
                $type = "VERBOSE";
                break;
        }
        $this->type = $type;
        $this->datetime = date("Y-m-d H:i:s");
    }

    public function toString()
    {
        return strval($this->datetime) . "\t" . strval($this->type) . "\t" . $this->tag . " -> " . $this->msg;
    }
}
