<?php
namespace App\Controller;

class ExampleController extends AbstractController
{
    public function execute()
    {
        $this->render('example.html.twig', [
            'example' => 'Beispiel'
        ]);
    }
}