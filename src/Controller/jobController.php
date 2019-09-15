<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Job;
use App\Entity\Task;

class jobController extends Controller
{   
    private $job;
    private $locale;
    /**
     * @Route("/job/find" , name="findjob")
     */
    public function findJob()
    {
        return $this->render('job/job_list.html.twig');
    }
    /**
     * @Route("/job/find/demo" , name="jobresult")
     */
    public function search(Request $request){
           $this->job = $request->query->get('job');
           $this->locale = $request->query->get('locale');
           //$job=$this->getDoctrine()->getRepository(job::class)->find($job,$locale);
           return $this->render('job/job_list1.html.twig',array('job' => $this->job , 'locale' => $this->locale));
    }
    /**
     * @Route("/test" , name="jobdetail")
     */
    public function details(){
        return $this->render('job/job_details1.html.twig');
    }
    /**
     * @Route("/postjob" , name="postjob")
     */
    public function postjob(){
        return $this->render('job/job_post_index.html.twig');
    }
    /**
     * @Route("/postjob/form" , name="post_form")
     */
    public function postform(){
        return $this->render('job/job_post_form.html.twig');
    }

    /**
     * @Route("/job/form", name="form-submit")
     */
    public function jobFormSubmit(Request $request){
        
        $job = new Job();
        $entityManager = $this->getDoctrine()->getManager();
        
        $job->setCompany_name($request->get('company'));
        $job->setDescription($request->get('description'));
        $job->setJob_title($request->get('title'));
        $job->setSecteur($request->get('category'));        
        $job->setNb_post(33);
        $job->setLocation($request->get('location'));
        $entityManager->persist($job);
        $entityManager->flush();
        
        return $this->render('mainfiles/test.html.twig',['job'=>$job]);
    }

}
?>