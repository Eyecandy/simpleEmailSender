<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index()
    {
        return $this->render("welcome/index.html.twig");
    }

    /**
     * @Route("/hello/{name}", name="hello_page"),requirements={"name"="[A-Z,a-z]+"}
     * @param string name
     */
    public function hello($name = "Joakim") {

        return $this->render("hello_page.html.twig", 
        [
            "my_variable" => $name
        ]
    );
    }
}
