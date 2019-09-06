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
        return $this->render('mainfiles/index.html.twig');
    }
    /**
     * @Route("/about" , name="about" )
     */
    public function about()
    {
        return $this->render('mainfiles/about.html.twig');
    }
    /**
     * @Route("/contact" , name="contact" )
     */
    public function contact()
    {
        return $this->render('mainfiles/contact.html.twig');
    }
    /**
     * @Route("/blog" , name="blog" )
     */
    public function blog()
    {
        return $this->render('mainfiles/blog.html.twig');
    }
    /**
     * @Route("/privacy" , name="privacy" )
     */
    public function privacy()
    {
        return $this->render('mainfiles/terms_privacy.html.twig');
    }

    
}
?>