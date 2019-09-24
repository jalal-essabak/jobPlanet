<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Application;
use App\Entity\Company;



class applicationController extends AbstractController
{
    /**
     * @Route("/job/apply/{id}", name="apply_job")
     */
    public function application(Request $request,$id,\Swift_Mailer $mailer)
    {
        $application = new Application();
        $application->setFullName($request->get('nom'));
        $application->setEmail($request->get('email'));
        $application->setCompetances($request->get('skills'));
        $resume = $request->files->get('cv');
        $application->setCV($resume->getClientOriginalName());
            
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
            $company= $this->getDoctrine()->getRepository(Company::class)->findById($id);

            $message = (new \Swift_Message('application a votre offre'))
            ->setFrom('oracle@gmail.com')
            ->setTo($application->getEmail())
            ->setBody('body')
            ->attach(\Swift_Attachment::fromPath('/public/Uploads/resume/'.$application->getCV()))
            ;
            
            
            
        return $this->render('index/index.html.twig',array('request'=>$request));
    }
}
?>