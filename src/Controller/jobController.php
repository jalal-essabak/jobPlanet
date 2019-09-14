<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Job;

class jobController extends Controller
{   
    
    public function getJob(Request $request)
    {
        $job = $request->query->get('job');
        $locale = $request->query->get('locale');
        $job_result=$this->getDoctrine()->getRepository(Job::class)->findAllJobs($job,$locale); 
        return $job_result;
    }
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
           $job_result=$this->getJob($request);
           return $this->render('mainfiles/job_list1.html.twig',array('job_result' => $job_result));
    }
    /**
     * @Route("/test/{secteur}" )
     */
    public function details($secteur){
        $job=$this->getDoctrine()->getRepository(Job::class)->finddetail($secteur); 
        return $this->render('mainfiles/job_details1.html.twig',array('job' => $job));
    }
    /**
     * @Route("/postjob" , name="postjob")
     */
    public function postjob(){
        return $this->render('mainfiles/job_post_1.html.twig');
    }
    /**
     * @Route("/postjob/form" , name="post_form")
     */
    public function postform(){
        return $this->render('mainfiles/job_post_2.html.twig');
    }
}
?>