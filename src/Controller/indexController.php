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
     * @Route("/")
     */
    public function index()
    {
        return $this->render('mainfiles/index.html.twig');
    }
    /**
     * @Route("/test" , name="jobdetails")
     */
    public function test(){
        return $this->render('mainfiles/job_details1.html.twig');
    }
}
?>