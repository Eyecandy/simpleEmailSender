<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            //we can now assume we are in a form submission.
            $contactFormData = $form->getData();
            dump($form);
            $message = (new \Swift_Message('Hello Email'))
            ->setFrom($contactFormData['email'])
            ->setTo('dumbtoots@mailinator.com')
            ->setBody(
               $contactFormData['message'],
               'text/plain'

            );

            $mailer->send($message);
            $this->addFlash("success","Mail sent successfully");

            

            



        }
        return $this->render("contact/contact.html.twig",
        [
            "our_form" => $form->createView()
        ]
    
    );
    }
}
