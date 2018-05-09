<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 15/03/18
 * Time: 08:22 AM
 */

// src/Controller/PageController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class PageController extends Controller
{
    /**
     * @Route("/")
     */
    public function home()
    {
        return $this->render ('Page/home.html.twig');
    }
    /**
     * @Route("/about")
     */
    public function about()
    {
        return $this->render ('Page/about.html.twig');
    }


}
