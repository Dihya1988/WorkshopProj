<?php

namespace MyApp\EspritBundle\Controller;

use MyApp\EspritBundle\Entity\Equipe;
use MyApp\EspritBundle\Form\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EquipeController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function ajoutEqAction(Request $request)
    {
        $equipe = new Equipe();
        $form = $this->createForm(EquipeType::class, $equipe);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();
            return $this->redirectToRoute('my_app_esprit_listeq');
        }
        return $this->render('MyAppEspritBundle:Equipe:ajouterEquipe.html.twig', array('form' => $form->createView()));
    }

    public function listeEqAction()
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('MyAppEspritBundle:Equipe')->findAll();
        return $this->render('MyAppEspritBundle:Equipe:listeEquipe.html.twig', array('equipes' => $equipes));
    }

    public function modifEqAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $eq=$em->getRepository('MyAppEspritBundle:Equipe')->findOneBy(array('idEq'=>$request->get('idEq')));
        $form=$this->createForm(EquipeType::class, $eq);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($eq);
            $em->flush();
            return $this->redirectToRoute('my_app_esprit_listeq');
        }
        return $this->render('MyAppEspritBundle:Equipe:modifierEquipe.html.twig',array('form'=>$form->createView()));

    }

public function supprimerEqAction(Request $request)
{
    $idEq=$request->get('idEq');
    $em=$this->getDoctrine()->getManager();
    $eq=$em->getRepository('MyAppEspritBundle:Equipe')->findOneBy(array('idEq'=>$idEq));
    $em->remove($eq);
    $em->flush();
    return $this->redirectToRoute('my_app_esprit_listeq');
}



}
