<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * Function to create an article
     * @param ManagerRegistry $doctrine
     * @param string $name
     * @param string $description
     * @param float $price
     * @param int $quantity
     * @param string $image
     * @return Response
     */
    #[Route('/article', name: 'create_article')]
    public function createArticle(ManagerRegistry $doctrine, string $name, string $description, float $price, int $quantity, string $image): Response
    {
        $entityManager = $doctrine->getManager();

        $article = new Article();
        $article->setName($name);
        $article->setDescription($description);
        $article->setPrice($price);
        $article->setQuantity($quantity);
        $article->setImage($image);

        // tell Doctrine to save the article
        $entityManager->persist($article);
        // execute the query
        $entityManager->flush();

        return new Response('Savec new article with id :'.$article->getId());
    }

    /**
     * Function to update an article
     * @param ManagerRegistry $doctrine
     * @param int $id
     * @return void
     */
    #[Route('/article/edit/{id}', name: 'article_edit')]
    public function updateArticle(ManagerRegistry $doctrine, int $id)
    {
        $entityManager = $doctrine->getManager();
        $article = $entityManager->getRepository(Article::class)->find($id);

        if(!$article){
            throw $this->createNotFoundException(
                'No article found for id $id'
            );
        }
    }
}
