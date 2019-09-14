<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @ORM\Column(type="text")
     */
    private $nom;

    public function getnom(): ?String
    {
        return $this->prenom;
    }
    /**
     * @ORM\Column(type="text")
     */
    private $prenom;

    public function getprenom(): ?String
    {
        return $this->prenom;
    }
    /**
     * @ORM\Column(type="text")
     */
    private $passwd;

    /*public function getpasswd(): ?String
    {
        return $this->passwd;
    }*/
}
