<?php

use App\Controller\ErrorController;
use App\Config\Config;

class Router
{
    private $routes = [];
    private $tribe = '';

    public function __construct()
    {
        $this->tribe = (new Config())->getRouting();
    }

    public function addRoute(
        string $path,
        string $controllerClass,
        string $errorPage = 'default_404.html.twig',
        bool $accessible = true
    ): bool {
        if (isset($this->routes[$path])) {
            //TODO: Errorlog
        }

        $this->routes[$path] = [
            'controller' => $controllerClass,
            'errorPage' => $errorPage,
            'accessible' => $accessible,
        ];

        return 0;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function searchRoute(string $requestUrl)
    {
        $requestUrl = str_replace($this->tribe, '', $requestUrl);

        foreach ($this->routes as $route => $options) {
            $regEx = "~^$route/?$~i";
            $matches = [];

            if (!preg_match($regEx, $requestUrl, $matches)) {
                continue;
            }
            
            if (
                !$options['accessible']
                || !is_callable([new $options['controller'](), 'execute'])
            ) {
                return call_user_func_array([new ErrorController(), 'execute'], [$options['errorPage']]);
            }

            array_shift($matches);

            return call_user_func_array([new $options['controller'](), 'execute'], $matches);
        }

        return call_user_func_array([new ErrorController(), 'execute'], [$options['errorPage']]);
    }
}