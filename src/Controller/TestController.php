<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        // return $this->render('test/index.html.twig', [
        //     'controller_name' => 'TestController',
        // ]);
        $content = '<html><body>Hello World!</body></html>';
        return new Response($content);
    }
}
