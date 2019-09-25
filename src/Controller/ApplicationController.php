<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Application;
use App\Entity\Job;
use App\Entity\Company;

class ApplicationController extends AbstractController
{
/**
     * @Route("/job/apply/{id}", name="apply_job")
     */
    public function application(Request $request,$id,\Swift_Mailer $mailer)
    {
        $date = new \DateTime();
        
        $application = new Application();
        $application->setFullName($request->get('nom'));
        $application->setEmail($request->get('email'));
        $application->setTelephone($request->get('telephone'));
        $application->setCompetances($request->get('skills'));
        $resume = $request->files->get('cv');
        $resumeName=uniqid().'_'.$resume->getClientOriginalName();
        $application->setCV($resumeName);
            
                try {
                    $resume->move(
                        $this->getParameter('resume_directory'),
                        $application->getCV('cv')
                    );
                } catch (FileException $e) {
                }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($application);
            $entityManager->flush();
            $job= $this->getDoctrine()->getRepository(Job::class)->find($id);
            
            $message = (new \Swift_Message('Application a votre offre : '.$job->getJob_title()))
            ->setFrom('jobPlanet@exemple.com')
            ->setTo($application->getEmail())
            ->setBody('Nom complet du candidat : '.$application->getFullName().', Competences : '.$application->getCompetances())
            ->attach(\Swift_Attachment::fromPath('/public/Uploads/resume/'.$application->getCV()));
            
            
            
        return $this->render('index/index.html.twig',array('request'=>$request));
    }
}
