<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        return $this->render('template.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function navigateLogin(): Response
    {
        return $this->render('login.html.twig');
    }


    /**
     * @Route("/register", name="register")
     */
    public function navigateRegister(): Response
    {
        return $this->render('security/registration.html.twig');
    }
}
