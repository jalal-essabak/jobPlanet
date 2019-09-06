<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class jobController extends Controller
{   
    private $job;
    private $locale;
    /**
     * @Route("/job/find" , name="findjob")
     */
    public function findJob()
    {
        return $this->render('mainfiles/job_list.html.twig');
    }
    /**
     * @Route("/job/find/demo" , name="jobresult")
     */
    public function search(Request $request){
           $this->job = $request->query->get('job');
           $this->locale = $request->query->get('locale');
           //$job=$this->getDoctrine()->getRepository(job::class)->find($job,$locale);
           return $this->render('mainfiles/job_list1.html.twig',array('job' => $this->job , 'locale' => $this->locale));
    }
    /**
     * @Route("/test" , name="jobdetail")
     */
    public function details(){
        return $this->render('mainfiles/job_details1.html.twig');
    }
}
?>