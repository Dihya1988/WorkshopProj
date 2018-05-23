<?php

namespace MyApp\EspritBundle\Controller;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserManagerInterface;
use MyApp\EspritBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyApp\EspritBundle\Entity\User;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class EmployeController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function AjouterEmployeAction(Request $request)
    {

        $employee= new User();
        $form=$this
            ->createForm(UserType::class,$employee);
        $form->handleRequest($request);
        if($form->isValid()){

           // $e[] = 'ROLE_EMPLOYE';
          //  $employee->setRoles($e);

            $em=$this->getDoctrine()->getManager();
            $em->persist($employee);
            $em->flush();
            return $this->redirectToRoute('my_app_esprit_mail');
        }

        return $this->render('MyAppEspritBundle:Gerant:RegisterEmp.html.twig',array('form'=>$form->createView()));
    }



    public function AccueilAction(){

        return $this->render('MyAppEspritBundle:Employe:PageAccueil.html.twig');
    }
}
