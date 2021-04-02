<?php

require_once 'Logger.php';

class MemoryLogger extends Logger
{

    private $logs = [];


    public function write(Log $log){
        $this->logs[] = $log;
    }

    public function read(){
        return $this->logs;
    }

    public function clean(){
        $this->logs = [];
    }
}

