<?php
namespace MyApp\EspritBundle\Controller;
use MyApp\EspritBundle\Entity\Equipe;
use MyApp\EspritBundle\Entity\User;
use MyApp\EspritBundle\Form\UserType;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GerantController extends Controller {


    function affichageGerantAction($user)
    {

        $em = $this->getDoctrine()->getManager();
        $us = $em->getRepository('MyAppEspritBundle:User')->FindOneBy(array('id'=> $this->getUser()));;
        return $this->render('MyAppEspritBundle:Gerant:AccueilGerant.html.twig', array('username'=>$user->getUsername()));

    }

    public function chartLineAction()
    {

       $em = $this->getDoctrine()->getManager();

        $nbemps = $em->getRepository('MyAppEspritBundle:User')->findNbEmp();

        //var_dump($nbemps);

        $tab = array();
        $categories = array();

        foreach ($nbemps as $nb) {
           var_dump($nb);
            array_push($tab,intval($nb['nbEmp']) );
          array_push($categories, ($nb['equipe']));

        }


        // Chart
       $series = array(
            array("name" => "Nb employés", "data" => array($tab))
       );

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');        //  #id du div où afficher le graphe
        $ob->title->text('Nombre d employés par équipe');
        $ob->xAxis->title(array('text' => "Equipe"));
        $ob->yAxis->title(array('text' => "Nb Employés"));
        $ob->xAxis->categories($categories);
        $ob->series($series);

        return $this->render('MyAppEspritBundle:Gerant:AccueilGerant.html.twig',
            array(
            'chart' => $ob
        ));
    }

    public function listeEmpAction()
    {
        $em = $this->getDoctrine()->getManager();
        $emp = $em->getRepository('MyAppEspritBundle:User')->findAll();
        return $this->render('MyAppEspritBundle:Gerant:ListEmp.html.twig', array('emp' => $emp));
    }

    public function modifEmpAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $emp=$em->getRepository('MyAppEspritBundle:User')->findOneBy(array('id'=>$request->get('id')));
        $form=$this->createForm(UserType::class, $emp);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($emp);
            $em->flush();
            return $this->redirectToRoute('my_app_esprit_listemp');
        }
        return $this->render('MyAppEspritBundle:Gerant:ModifEmp.html.twig',array('form'=>$form->createView()));

    }

    public function supprimerEmpAction(Request $request)
    {
        $id=$request->get('id');
        $em=$this->getDoctrine()->getManager();
        $emp=$em->getRepository('MyAppEspritBundle:User')->findOneBy(array('id'=>$id));
        $em->remove($emp);
        $em->flush();
        return $this->redirectToRoute('my_app_esprit_listemp');
    }
}