<?php
/**
 * Created by PhpStorm.
 * User: Nouha
 * Date: 26/03/2017
 * Time: 08:47
 */

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Mail
 * @ORM\Entity(repositoryClass="MyApp\EspritBundle\Repository\MailRepository")
 */
class Mail
{


    private $nom;

    private $prenom;

    private $email;

    private $pwd;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

     /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

     /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }


}