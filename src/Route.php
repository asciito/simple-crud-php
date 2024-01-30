<?php

namespace Asciito\SimpleCrud;

use Closure;
use Asciito\SimpleCrud\View;

class Route
{
    protected const GET  = 'GET';
    protected const POST = 'POST';

    protected static array $routes = [];

    public static function get(string $pattern, Closure $callback): void
    {
        static::registerRoute(Route::GET, $pattern, $callback);
    }

    public static function post(string $pattern, Closure $callback): void
    {
        static::registerRoute(Route::POST, $pattern, $callback);
    }

    public static function registerRoute(string $method, string $pattern, Closure $callback): void
    {
        static::$routes[$method] = [$pattern => $callback];
    }

    public static function dispatch(): void
    {
        $routes = static::getRoutesForRequestMethod();

        if (empty( $callback = $routes[static::getURI()] ?? null )) {
            $view = View::create('404');
        } else {
            $view = $callback();

            if (! ($view instanceof View)) {
                throw new \Exception('The return value is not a instance of '.View::class);
            }
        }

        $view->render();
    }

    protected static function getURI(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    protected static function getRoutesForRequestMethod(): array
    {
        $method = $_SERVER['REQUEST_METHOD'];

        return static::$routes[$method] ?? [];
    }
}