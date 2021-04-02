<?php

class RomanNumeral{
    const LETTERS = ["I"=> 1, "V"=> 5, "X"=>10, "L"=>50, "C"=>100, "D"=>500, "M"=>1000];
    private $number;

    function __construct(string $number)
    {
        if($number == "" || preg_match("/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/", $number) == 0) throw new DomainException("non un numero romano");
        $this->number = $number;

    }

    function getNumber(){
        return $this->number;
    }

    function convertToInt(): int{
        $result = 0;
        $num = $this->number;
        for($i = 0; $i < strlen($num); $i++){
            if($i < strlen($num) - 1){
                if(RomanNumeral::LETTERS[$num[$i]] >= RomanNumeral::LETTERS[$num[$i + 1]]){
                    $result += RomanNumeral::LETTERS[$num[$i]];
                }
                else {
                    $result += (RomanNumeral::LETTERS[$num[$i + 1]] - RomanNumeral::LETTERS[$num[$i]]);
                    $i++;
                }
            }
            else{
                $result += RomanNumeral::LETTERS[$num[$i]];
            }
            
        }
        return $result;
    }

}