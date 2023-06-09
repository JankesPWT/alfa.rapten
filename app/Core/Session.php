<?php

namespace App\Core;

class Session
{
    public function start()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function exists($key)
    {
        return isset($_SESSION[$key]);
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function flash($key, $value)
    {
        $this->set($key, $value);
        $this->remove($key);
    }

    public function destroy()
    {
        session_destroy();
    }
}
