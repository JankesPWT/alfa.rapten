<?php

namespace App\Helpers;

class Helpers 
{

    public function printer($tablica) {
        echo '<pre>';
        print_r($tablica);
        echo '</pre>';
    }
    
    public function dumper($tablica) {
        echo '<pre>';
        var_dump($tablica);
        echo '</pre>';
    }
    
    public function magic()
    {
        echo "DIR: " . __DIR__;
        echo '<br>';
        echo "FILE: " . __FILE__;
    }
    
    public function getty()
    {
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
    }
    
    public function classy()
    {
        echo "<pre>";
        print_r(get_declared_classes());
        echo "</pre>";
    }
}