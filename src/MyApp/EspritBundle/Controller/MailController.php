<?php

namespace MyApp\EspritBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swift_Message;
use Symfony\Component\HttpFoundation\Request;
use MyApp\EspritBundle\Entity\Mail;
use MyApp\EspritBundle\Form\MailType;
use Symfony\Component\HttpFoundation\Response;


class MailController extends Controller
{

    public function indexAction(Request $request)

    {

       $mail = new Mail();

        $form = $this->createForm(MailType::class, $mail);

        $form->handleRequest($request);

        if ($form->isValid()) {
$email=$mail->getEmail();
            $message = \Swift_Message::newInstance()
                ->setSubject('Bienvenu sur SocialPro')
                ->setFrom('socialproesprit@gmail.com')
                ->setTo($email)
                ->setBody(

                    $this->renderView(
                        'MyAppEspritBundle:Mail:email.html.twig',
                        array('nom' => $mail->getNom(), 'prenom' => $mail->getPrenom(), 'pwd'=>$mail->getPwd())
                    ),'text/html');

            $mailer = $this->get('mailer');

            $mailer->send($message);


            return $this->redirectToRoute('my_app_mail_accuse');
        }
        return $this->render('MyAppEspritBundle:Mail:index.html.twig', array('form'=>$form

            ->createView()));

    }

    public function successAction(){

        return $this->render('MyAppEspritBundle:Mail:success.html.twig');


    }
}

