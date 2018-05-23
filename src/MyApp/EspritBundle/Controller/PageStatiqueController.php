<?php

namespace MyApp\EspritBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageStatiqueController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function afficheAccAction(){
        return $this->render('MyAppEspritBundle:Pagesstatiques:Accueil.html.twig');
    }
}
