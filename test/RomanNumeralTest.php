<?php

use App\StringSanitizer;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . "\..\src\RomanNumeral.php";

class RomanNumeralTest extends TestCase{
    /** 
     * @test
     */
    public function create_roman_numeral(){
        $romanNumeral = new RomanNumeral("MMVI");
        $this->assertInstanceOf(RomanNumeral::class, $romanNumeral);
        $this->assertEquals("MMVI", $romanNumeral->getNumber());
    }

    /** 
     * @test
     */
    public function create_roman_numeral_wrong(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("dsffMfdMVIdtrtryv");
    }

    /** 
     * @test
     */
    public function create_roman_numeral_wrong_2(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("XXXX");
    }

    /** 
     * @test
     */
    public function create_roman_numeral_wrong_3(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("IIII");
    }

    /** 
     * @test
     */
    public function create_roman_numeral_wrong_4(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("VVVV");
    }

    /** 
     * @test
     */
    public function create_roman_numeral_wrong_5(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("LLLL");
    }


    /** 
     * @test
     */
    public function create_roman_numeral_wrong_7(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("CCCC");
    }

    /** 
     * @test
     */
    public function create_roman_numeral_wrong_8(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("DDDD");
    }

    /** 
     * @test
     */
    public function create_roman_numeral_wrong_9(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("MMMMMMDDDDDDCCCCCCLLLLLXXXXXXVVVVVVIIIIIII");
    }

    /** 
     * @test
     */
    public function create_roman_numeral_wrong_empty_string(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("non un numero romano");
        $romanNumeral = new RomanNumeral("");
    }

    /** 
     * @test
     */
    public function convert_roman_number_to_int(){
        $romanNumeral = new RomanNumeral("MMVI");
        $this->assertEquals(2006, $romanNumeral->convertToInt());
    }

    /** 
     * @test
     */
    public function convert_roman_number_to_int_2(){
        $romanNumeral = new RomanNumeral("MCMXLIV");
        $this->assertEquals(1944, $romanNumeral->convertToInt());
    }

    /** 
     * @test
     */
    public function convert_roman_number_to_int_3(){
        $romanNumeral = new RomanNumeral("MCMLXXXVIII");
        $this->assertEquals(1988, $romanNumeral->convertToInt());
    }

    /** 
     * @test
     */
    public function convert_roman_number_to_int_4(){
        $romanNumeral = new RomanNumeral("MMMDCCCLXXXVIII");
        $this->assertEquals(3888, $romanNumeral->convertToInt());
    }

    /** 
     * @test
     */
    public function convert_roman_number_to_int_5(){
        $romanNumeral = new RomanNumeral("MCMLIII");
        $this->assertEquals(1953, $romanNumeral->convertToInt());
    }

    /** 
     * @test
     */
    public function convert_roman_number_to_int_6(){
        $romanNumeral = new RomanNumeral("MMXXXIX");
        $this->assertEquals(2039, $romanNumeral->convertToInt());
    }

    /** 
     * @test
     */
    public function convert_roman_number_to_int_7(){
        $romanNumeral = new RomanNumeral("MCMLXXXVI");
        $this->assertEquals(1986, $romanNumeral->convertToInt());
    }
}