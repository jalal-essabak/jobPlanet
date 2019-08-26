<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class jobController extends Controller
{
    /**
     * @Route("/job/find")
     */
    public function index()
    {
        return $this->render('mainfiles/job_list.html.twig');
    }
    
}
?>