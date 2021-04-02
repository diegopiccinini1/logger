<?php

use App\StringSanitizer;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . "\..\src\StringSanitizer.php";

class StringSanitizerTest extends TestCase{
    /** 
     * @test
     * @covers StringSanitizer::sanitize()
     */
    public function sanitizeTest(){
        $sanitizer = new StringSanitizer();
        $sanitized = $sanitizer->sanitize("string_to_sanitize");
        $this->assertEquals("string to sanitize", $sanitized);
    }

}