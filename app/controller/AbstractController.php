<?php
namespace App\Controller;

abstract class AbstractController
{
    protected function render(string $view, array $parameters = []) {
        require_once __DIR__ . '/../../vendor/autoload.php';

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../themes/theme/view');
        $twig = new \Twig\Environment($loader);

        echo $twig->render($view, $parameters);
    }
}