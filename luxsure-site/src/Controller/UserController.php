<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class UserController
{
    #[Route('/')]
    public function homepage() : Response
    {
       return new Response('Title : Luxsure');
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null) : Response
    {
        if($slug) {
            $title = 'User: '.u(str_replace('-', ' ', $slug))->title(true);
        }
        else {
            $title = 'All Users';
        }
        return new Response($title);
    }
}