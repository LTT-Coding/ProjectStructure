<?php
namespace App\Controller;

class ErrorController extends AbstractController
{
    public function execute(string $errorPage)
    {
        $this->render($errorPage);
    }
}