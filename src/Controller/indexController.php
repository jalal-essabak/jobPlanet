<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class indexController extends Controller
{
    /**
     * @Route("/" , name="index" )
     */
    public function index()
    {
        return $this->render('index/index.html.twig');
    }
    /**
     * @Route("/about" , name="about" )
     */
    public function about()
    {
        return $this->render('index/about.html.twig');
    }
    /**
     * @Route("/contact" , name="contact" )
     */
    public function contact()
    {
        return $this->render('index/contact.html.twig');
    }
    /**
     * @Route("/blog" , name="blog" )
     */
    public function blog()
    {
        return $this->render('index/blog.html.twig');
    }
    /**
     * @Route("/privacy" , name="privacy" )
     */
    public function privacy()
    {
        return $this->render('index/terms_privacy.html.twig');
    }

    
}
?>