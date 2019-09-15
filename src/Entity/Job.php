<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    public function setId($id)
    {
        $this->id=$id;
    }
    /**
     * @ORM\Column(type="string")
     */

    private $secteur;

    public function getSecteur(): ?String 
    {
        return $this->secteur;
    }
    public function setSecteur($secteur) 
    {
        $this->secteur=$secteur;
    }
    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function getDescription(): ?String
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description=$description;
    }
     /**
     * @ORM\Column(type="text")
     */
    private $city;

    public function getCity(): ?String
    {
        return $this->city;
    }
    public function setCity($city)
    {
        $this->city=$city;
    }
     /**
     * @ORM\Column(type="text")
     */
    private $title;

    public function getTitle(): ?String
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title=$title;
    }
    /**
     * @ORM\Column(type="string")
     */
    private $company_name;

    public function getCompany_name(): ?String 
    {
        return $this->company_name;
    }
    public function setCompany_name($company_name) 
    {
        $this->company_name=$company_name;
    }


     /**
     * @ORM\Column(type="string")
     */
    private $job_title;

    public function getJob_title(): ?String 
    {
        return $this->job_title;
    }
    public function setJob_title($job_title) 
    {
        $this->job_title=$job_title;
    }



    /**
     * @ORM\Column(type="integer")
     */
    private $nb_post;

    public function getNb_post()
    {
        return $this->nb_post;
    }
    public function setNb_post($nb_post)
    {
        $this->nb_post=$nb_post;
    }
    
    
     /**
     * @ORM\Column(type="string")
     */
    private $location;

    public function getLocation(){
        return $this->location;
    }
    public function setLocation($location){
        $this->location=$location;
    }



}
