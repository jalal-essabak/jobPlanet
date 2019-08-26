<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
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
     * @ORM\secteur()
     * @ORM\Column(type="text")
     */
    private $secteur;

    public function getSecteur(): ?String 
    {
        return $this->secteur;
    }
    /**
     * @ORM\description()
     * @ORM\Column(type="text")
     */
    private $description;

    public function getDescription(): ?String
    {
        return $this->description;
    }
    /**
     * @ORM\company_name()
     * @ORM\Column(type="text")
     */
    private $company_name;

    public function getCompany_name(): ?String 
    {
        return $this->company_name;
    }
    /**
     * @ORM\nb_post()
     * @ORM\Column(type="text")
     */
    private $nb_post;

    public function getNb_post()
    {
        return $this->nb_post;
    }
}
