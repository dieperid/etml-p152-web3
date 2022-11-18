<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    #[Route('/')]
    public function homepage() : Response
    {
       return new Response('Title : Luxsure');
    }

    #[Route('/browse/{slug}')]
    public function browse($slug) : Response
    {
        return new Response('Title :'.$slug);
    }
}