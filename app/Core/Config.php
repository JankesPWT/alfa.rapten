<?php

declare(strict_types=1);

namespace App\Core;

class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db'     => [
                'host'      => $env['DB_HOST'],
                'username'  => $env['DB_USER'],
                'password'  => $env['DB_PASS'],
                'database'  => $env['DB_DATABASE'],
                'driver'    => $env['DB_DRIVER'] ?? 'mysql',
                'charset'   => 'utf8mb4',
                'collation' => 'utf8_polish_ci',
                'prefix'    => '',
            ],
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}