<?php

namespace App\Controller;
use App\Entity\Services;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServicesController extends Controller
{
    /**
     * @Route("/services", name="services")
     */

    public function index()
    {

        $posts = $this->getDoctrine()->getRepository(Services::class)->findAll();

        if (!$posts) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }

        return $this->render('services/index.html.twig', [
            'posts' => $posts,
        ]);
    }

}
