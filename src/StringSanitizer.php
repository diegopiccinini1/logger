<?php

namespace App;

class StringSanitizer{
    public function sanitize($string){
        return str_replace("_", " ", $string);
    }
}
