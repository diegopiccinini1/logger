<?php

use App\Money\Money;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . "\..\src\Money.php";

class MoneyTest extends TestCase{
    /**
     * @test
     */
    public function test_can_create_money_from_int(){
        $money = new Money(10);
        $this->assertInstanceOf(Money::class, $money);
        $this->assertEquals(10, $money->getValue());
    }

    /**
     * @test
     */
    public function test_can_create_money_from_float(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("money can only created from integer number");
        $money = new Money(10.0);
        
    }

    /**
     * @test
     */
    public function test_can_create_money_from_string(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("money can only created from integer number");
        $money = new Money("asdf");
        
    }

    /**
     * @test
     */
    public function test_can_create_money_with_negative_value(){
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("Il numero non può essere negativo");
        $money = new Money(-20);
        
    }

    /**
     * @test
     */
    public function test_compare(){
        $money1 = new Money(10);
        $money2 = new Money(20);
        $money3 = new Money(10);

        $this->assertEquals(1, $money2->compareTo($money1));
        $this->assertEquals(-1, $money1->compareTo($money2));
        $this->assertEquals(0, $money1->compareTo($money3));
    }

    /**
     * @test
     */
    public function test_add(){
        $money1 = new Money(10);
        $money2 = $money1->add(10);

        $this->assertEquals(20, $money2->getValue());
    }

    /**
     * @test
     */
    public function test_subtract(){
        $money1 = new Money(10);
        $money2 = $money1->subtract(5);

        $this->assertEquals(5, $money2->getValue());
    }

    
    /**
     * @test
     */
    public function test_subtract_negative(){
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("negative money");
        $money1 = new Money(10);
        $money2 = $money1->subtract(15);
    }

}