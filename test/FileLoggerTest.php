<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

require_once __DIR__ . "\..\src\Logger\FileLogger.php";

class FileLoggerTest extends TestCase
{
    /**
     * @test
     */
    public function log()
    {
        if(file_exists("./log.log")) unlink("./log.log");
        $logger = new FileLogger("./log.log");

        $log1 = new Log("Prova", "messaggio di prova 1", Log::DEBUG);
        $log2 = new Log("Prova", "messaggio di prova 2", Log::WARNING);
        $log3 = new Log("Prova", "messaggio di prova 3", Log::ERROR);


        $logger->write($log1);
        $logger->write($log2);
        $logger->write($log3);

        $file = $logger->read();

        assertTrue(strpos($file[0], "Prova") !== false &&
            strpos($file[0], "messaggio di prova 1") !== false && 
            strpos($file[0], "DEBUG") !== false
        );

        assertTrue(strpos($file[1], "Prova") !== false &&
            strpos($file[1], "messaggio di prova 2") !== false && 
            strpos($file[1], "WARNING") !== false
        );

        assertTrue(strpos($file[2], "Prova") !== false &&
            strpos($file[2], "messaggio di prova 3") !== false && 
            strpos($file[2], "ERROR") !== false
        );
    }


    /**
     * @test
     */
    public function file_not_readable()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("File non leggibile");

        if(file_exists("./log.log")) unlink("./log.log");

        touch("./log.log");
        chmod("./log.log", 0222);

        $logger = new FileLogger("./log.log");
    }

    /**
     * @test
     */
    public function file_not_writable()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("File non scrivibile");

        if(file_exists("./log.log")) unlink("./log.log");

        touch("./log.log");
        chmod("./log.log", 0444);

        $logger = new FileLogger("./log.log");
    }
}
