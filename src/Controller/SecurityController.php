<?php

namespace App\Controller;
use App\Entity\Company;
use App\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/admin/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //    $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

     /**
     * @Route("/admin", name="confirm_registrations")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index(){

        $companies = $this->getDoctrine()
        ->getRepository(Company::class)
        ->findNonConfirmedCompanies();
        return $this->render('security/index.html.twig',['companies'=>$companies]);
    }

       /**
     * @Route("/admin/change-password", name="admin_password_change")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function changePassword(){
        return $this->render('security/index.html.twig');
    }

    /**
     * @Route("/admin/confirm-company/{id}", name="confirm_company")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function confirmCompany($id){
        $entityManager = $this->getDoctrine()->getManager();

        $company = $this->getDoctrine()
        ->getRepository(Company::class)
        ->find($id);
        $company->setConfirmed(true);

        $entityManager->persist($company);
        $entityManager->flush();
        
        return $this->redirectToRoute('admin_index');
    }
    /**
     * @Route("/admin/jobs", name="confirm_jobs")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function confirmJobs(){

        $jobs = $this->getDoctrine()
        ->getRepository(Job::class)
        ->findNonConfirmedJobs();

        return $this->render('security/jobs.html.twig',['jobs'=>$jobs]);

    }
    /**
     * @Route("/admin/confirm-job/{id}", name="confirm_job")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function confirmJob($id){
        
        
    }
}
