<?php

namespace core;

class Session
{

    public static function has($key) {
        return (bool) static::get($key);
    }
    public static function put($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null) {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value) {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash() {
        unset($_SESSION['_flash']);
    }

    public static function flush() {
        $_SESSION = [];
    }

    public static function destroy() {
        // Destroy session
        static::flush();
        session_destroy();

        // Destroy client cookie
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}