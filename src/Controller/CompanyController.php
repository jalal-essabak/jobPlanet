<?php

namespace App\Controller;
use App\Entity\Company;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class CompanyController extends AbstractController
{
    /**
     * @Route("/company/register", name="register")
     */
    public function register()
    {
        return $this->render('company/register.html.twig');
    }
    /**
     * @Route("/company/login", name="login")
     */
    public function login()
    {
        return $this->render('company/login.html.twig');
    }
    /**
     * @Route("/register/form", name="registration-submit")
     */
    public function registerSubmit(UserPasswordEncoderInterface $encoder,Request $request){
        
        
        $company = new Company();
        $entityManager = $this->getDoctrine()->getManager();

        $company->setCompany ($request->get('company'));
        $company->setEmail ($request->get('email'));
        $company->setTelephone ($request->get('telephone'));
        $company->setAdresse ($request->get('adresse'));
        $company->setlocation ($request->get('location'));
        $company->setCategory ($request->get('category'));
        $plainPassword = $request->get('password');

        $company->setPassword ($request->get('password'));
        $company->setConfirmed (false);
        

        $companyDB = $this->getDoctrine()
        ->getRepository('App\Entity\Company')
        ->findOneBy(array('email' => $company->getEmail()));

        if($companyDB==null){

        $encodedPassword = $encoder->encodePassword($company, $plainPassword);
        $company->setPassword($encodedPassword);
        $entityManager->persist($company);
        $entityManager->flush();
        
        return $this->redirectToRoute('index');
        }
        else
        return $this->render('company/register.html.twig',['error'=>true]);
    
    }
     /**
     * @Route("/login/form", name="company_login")
     */
    public function loginSubmit(UserPasswordEncoderInterface $encoder,Request $request,SessionInterface $session){

        $companyEmail=$request->get('email');
        $userPlainPassword = $request->get('password');

        $user = $this->getDoctrine()
        ->getRepository('App\Entity\Company')
        ->findOneBy(array('email' => $companyEmail));

        if($user==null || !$encoder->isPasswordValid($user,$userPlainPassword)){

            return $this->render('company/login.html.twig',['error'=>"Les identifiants sont incorrects",'email'=>$companyEmail]);
        }
        else{
            if($user->getConfirmed()==0){
                return $this->render('company/login.html.twig',['error'=>"Votre compte n'est pas encore confirmé",'email'=>$companyEmail]);
            }
            else {
                $session->set('company', $user);
                return $this->redirectToRoute('index');
            }
     
        }
        
    }
     /**
     * @Route("/company/logout", name="company_logout")
     */
    public function logout(SessionInterface $session){
        $session->set('company', null);
        return $this->redirectToRoute('index');
    }
}
