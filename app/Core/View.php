<?php

declare(strict_types=1);

namespace App\Core;

use App\Exceptions\ViewNotFoundException;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View
{
    public static Environment $twig;

    public static function make(string $view, array $data = [])
    {
        $view = $view . ".php";
        return static::render($view, $data);
    }

    public static function render(string $view, array $data = []): void
    {
        $loader = new FilesystemLoader(dirname(__DIR__) . '/Views');
        self::$twig = new Environment($loader);
        
        echo self::$twig->render($view, $data);
    }

    public function __get(string $name)
    {
        return $this->data[$name] ?? null;
    }
}