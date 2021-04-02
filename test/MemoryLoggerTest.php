<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

require_once __DIR__ . "\..\src\Logger\MemoryLogger.php";

class MemoryLoggerTest extends TestCase
{

    /**
     * @test
     */
    public function test_read_write(){
        $logger = new MemoryLogger();

        $log1 = new Log("Prova", "messaggio di prova 1", Log::DEBUG);
        $log2 = new Log("Prova", "messaggio di prova 2", Log::DEBUG);
        $log3 = new Log("Prova", "messaggio di prova 3", Log::DEBUG);

        $logger->write($log1);
        $logger->write($log2);
        $logger->write($log3);

        assertEquals([$log1, $log2, $log3], $logger->read());

        $logger->clean();
        assertEquals([], $logger->read());

    }
}
