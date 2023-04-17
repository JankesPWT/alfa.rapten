<?php

namespace App\Helpers;

class Dates 
{
    public string $date;

    public function __construct($date) 
    {
        $this->date = $date;
   
    }

    # liczba pełnych lat od podanej daty do dzisiaj
    # jeśli jest powyżej 1000, zwraca 'x'
    public static function age($date) : ?string
    {
        $do = new \DateTime('now');
        $od = new \DateTime($date);

        $interval = $do->diff($od);
        
        $age = $interval->format('%y');
        if ($age > 1000) $age = "x";
        
        return $age;
    }
}