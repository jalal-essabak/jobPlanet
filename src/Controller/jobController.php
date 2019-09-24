<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Job;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Company;

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
        $repository = $this->getDoctrine()->getRepository(Job::class);
        $job_result = $repository->findByConfirmation(1);
        return $this->render('job/job_list.html.twig',array('job_result'=>$job_result));
    }
    /**
     * @Route("/job/find/demo" , name="jobresult")
     */
    public function search(Request $request){
           $job_result=$this->getJob($request);
           return $this->render('job/job_list1.html.twig',array('job_result' => $job_result));
    }
    /**
     * @Route("/test/{id}" )
     */
    public function details($id){
        $job=$this->getDoctrine()->getRepository(Job::class)->finddetail($id); 
        return $this->render('job/job_details.html.twig',array('job' => $job));
    }
    /**
     * @Route("/postjob" , name="postjob")
     */
    public function postjob(){
        return $this->render('job/job_post_index.html.twig');
    }
    /**
     * @Route("/postjob/company" , name="company")
     */
    public function registerCompany(SessionInterface $session){
        if(!$session->get('company')){
            return $this->render('company/login.html.twig');    
        }
        return $this->render('job/job_post_form.html.twig');
    }

    /**
     * @Route("/postjob/form" , name="post_form")
     */
    public function postform(Request $request){
        
        

        $company = new Company();
        $entityManager = $this->getDoctrine()->getManager();

        $company->setCompany ($request->get('company'));
        $company->setEmail ($request->get('email'));
        $company->setTelephone ($request->get('telephone'));
        $company->setAdresse ($request->get('adresse'));
        $company->setlocation ($request->get('location'));
        $company->setCategory ($request->get('category'));
        $company->setPassword ($request->get('password'));
        $company->setConfirmed (false);
        $entityManager->persist($company);
        $entityManager->flush();

        
        return $this->redirectToRoute('findjob');        
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
        $job->setSkills($request->get('competences'));        
        $job->setNb_post($request->get('nb_postes'));
        $job->setLocation($request->get('location'));
        $job->setConfirmation(0);
        $entityManager->persist($job);
        $entityManager->flush();
        
        return $this->redirectToRoute('findjob');
    }

}
?>