<?php

/**
 * Created by PhpStorm.
 * User: Nouha
 * Date: 14/04/2017
 * Time: 12:42
 */

namespace MyApp\EspritBundle\Repository;

use Doctrine\ORM\EntityRepository;


class GerantRepository extends EntityRepository
{

function findNbEmp()
{
    $query = $this->getEntityManager()
        ->createQuery("Select COUNT(distinct u.id) AS nbEmp, e.nomEq as equipe
                                   FROM MyAppEspritBundle:User u INNER JOIN MyAppEspritBundle:Equipe e
                                   WITH u.id_equipe=e.idEq
                                   GROUP BY u.id_equipe");

    return $query->getResult();


}




}