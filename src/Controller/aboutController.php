<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class aboutController extends Controller
{
    /**
     * @Route("/")
     */
    public function about()
    {
        return $this->render('mainfiles/about.html.twig');
    }
}
?>