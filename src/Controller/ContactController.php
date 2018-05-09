<?php

namespace App\Controller;

use App\Entity\Contact;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request)
    {
        if ($request->getMethod()== 'POST')
        {
            $entityManager = $this->getDoctrine()->getManager();
            $contact = new Contact();
            $contact->setName($request->get('name'));
            $contact->setEmail($request->get('email'));
            $contact->setPhone($request->get('phone'));
            $contact->setMessage($request->get('message'));
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash("success", "Mensaje Enviado Correctamente ");
            $this-> sendEmail(array('name'=> $request->get('name'),
                    'email'=> $request->get('email'),
                    'message'=> $request->get('message'))
            );
        }



        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    private function sendEmail($data){
        $myappContactMail = 'topicos_web@itcelaya.edu.mx';
        $myappContactPassword = 'TopicosProgra';

        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
            ->setUsername($myappContactMail)
            ->setPassword($myappContactPassword);

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Ejemplo envio de correos'))
            ->setFrom(array($myappContactMail => "Message by ".$data["name"]))
            ->setTo(array(
                $myappContactMail => $myappContactMail
            ))
            ->setBody($data["message"]."<br>ContactMail :".$data["email"]);

        return $mailer->send($message);
    }
}
