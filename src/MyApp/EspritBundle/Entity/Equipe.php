<?php
/**
 * Created by PhpStorm.
 * User: Nouha
 * Date: 06/04/2017
 * Time: 16:07
 */

namespace MyApp\EspritBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Equipe
 * @ORM\Entity
 */

class Equipe
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idEq;

    /**
     * @ORM\Column(type="string")
     */

    private $nomEq;


    /**
     * @return mixed
     */
    public function getIdEq()
    {
        return $this->idEq;
    }


    /**
     * @return mixed
     */
    public function getNomEq()
    {
        return $this->nomEq;
    }

    /**
     * @param mixed $nomEq
     */
    public function setNomEq($nomEq)
    {
        $this->nomEq = $nomEq;
    }

}