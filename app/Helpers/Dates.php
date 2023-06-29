<?php

namespace App\Helpers;
use Carbon\Carbon;
use DateTime;

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
        //$howOldAmI = Carbon::createFromDate(1975, 5, 21)->age;
        
        $do = new DateTime('now');
        $od = new DateTime($date);
        
        $interval = $do->diff($od);
        
        $age = $interval->format('%y');
        if ($age > 1000) $age = "x";
        
        return $age;
    }

    # tworzy date w formacie timestamp po podaniu parametrów
    public static function dateFormatter (int $year, int $month, int $day)
    {
        list($year, $hour) = ($year == 0) ? ['1001', 23] : [$year, '00'];
        list($month, $minute) = ($month == 0) ? ['01', 59] : [$month, '00'];
        list($day, $second) = ($day == 0) ? ['01', 59] : [$day, '00'];
        
        $date = "$year-$month-$day $hour-$minute-$second";
        
        return $date;
    }

}