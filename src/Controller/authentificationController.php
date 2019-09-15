<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class authentificationController extends Controller
{   
    /**
     * @Route("/login" , name="login")
     */
    public function login(){
        return $this->render('user/login.html.twig');
    }
    /**
     * @Route("/register" , name="register")
     */
    public function register(){
        return $this->render('user/register.html.twig');
    }
    /**
     * @Route("/changepass" , name="changepass")
     */
    public function changepass(){
        return $this->render('user/change_password.html.twig');
    }
  
}
?>