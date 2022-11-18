<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class UserController extends AbstractController
{
    #[Route('/')]
    public function homepage() : Response
    {
        $shoes = [
            ['shoe' => 'Air Force 1', 'artist' => 'David'],
            ['shoe' => 'Jordan 4', 'artist' => 'David'],
            ['shoe' => 'New Balance 2002R', 'artist' => 'David'],
            ['shoe' => 'Air Max Plus TN', 'artist' => 'David'],
        ];

       return $this->render('user/user.html.twig', [
           'title' => 'Luxsure Shoes',
           'shoes' => $shoes,
       ]);
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