<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    /**
     * @Route("/user/register", name="registration")
     */
    public function register(UserPasswordEncoderInterface $encoder,Request $request){
        
        $user=new User();
        $entityManager = $this->getDoctrine()->getManager();
        
        $user->setFirstName($request->get('firstName'));
        $user->setLastName($request->get('lastName'));
        $user->setEmail($request->get('email'));
        $plainPassword = $request->get('password');

        $encodedPassword = $encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);

        $entityManager->persist($user);
        $entityManager->flush();

         return $this->redirectToRoute('index');

        
    }
     /**
     * @Route("/user/login", name="user-login")
     */
    public function login(UserPasswordEncoderInterface $encoder,Request $request){

        $userEmail=$request->get('email');
        $userPlainPassword = $request->get('password');

        $user = $this->getDoctrine()
        ->getRepository('App\Entity\User')
        ->findOneBy(array('email' => $userEmail));

        if($user==null || !$encoder->isPasswordValid($user,$userPlainPassword)){
            return $this->render('user/login.html.twig',['error'=>true,'email'=>$userEmail]);
        }
        else{
            /*if($encoder->isPasswordValid($user,$userPlainPassword)){
                return $this->redirectToRoute('index');
            }
            else
            return $this->redirectToRoute('login',['error',true,'email'=>$userEmail]);
            */
            return $this->redirectToRoute('index');
        }
        return $this->render('mainfiles/test.html.twig',['result'=>$result,'email'=>$userEmail]);
    }

}   
