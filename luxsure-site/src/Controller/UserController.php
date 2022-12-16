<?php

/**
 * ETML
 * Auteur : David Dieperink, Stefan Petrovic, Noa Chouriberry
 * Date : 16.12.2022
 * Description : Class for the user controller
 */

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * Function to create a new user
     * @param ManagerRegistry $doctrine
     * @param string $username
     * @param string $password
     * @param int $rights
     * @return Response
     */
    #[Route('/user', name: 'app_user')]
    public function createUser(ManagerRegistry $doctrine, string $username, string $password, int $rights): Response
    {
        $entityManager = $doctrine->getManager();

        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setRights($rights);

        // tell Doctrine to save the user
        $entityManager->persist($user);
        // execute the query
        $entityManager->flush();

        return new Response('Savec new user with id :'.$user->getId());
    }

    /**
     * Function to update the information of a user
     * @param ManagerRegistry $doctrine
     * @param int $id
     * @return void
     */
    #[Route('/user/edit/{id}', name: 'user_edit')]
    public function updateUser(ManagerRegistry $doctrine, int $id)
    {
        $entityManager = $doctrine->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);

        if(!$user){
            throw $this->createNotFoundException(
                'No user found for id $id'
            );
        }
    }
}
