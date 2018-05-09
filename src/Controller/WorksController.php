<?php

namespace App\Controller;
use App\Entity\Works;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorksController extends Controller
{
    /**
     * @Route("/works", name="works")
     */
    public function index()
    {

        $posts = $this->getDoctrine()->getRepository(Works::class)->findAll();

        if (!$posts) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }

        return $this->render('works/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}