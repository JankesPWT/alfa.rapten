<?php

function printer($tablica) {
    echo '<pre>';
    print_r($tablica);
    echo '</pre>';
}

function dumper($tablica) {
    echo '<pre>';
    var_dump($tablica);
    echo '</pre>';
}

function magic() {
    echo "DIR: " . __DIR__;
    echo '<br>';
    echo "FILE: " . __FILE__;
}

function getty()
{
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
}

function classy()
{
    echo "<pre>";
    print_r(get_declared_classes());
    echo "</pre>";
}