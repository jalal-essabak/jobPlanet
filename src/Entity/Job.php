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
    public function setId($id)
    {
        $this->id=$id;
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
    public function setSecteur($secteur) 
    {
        $this->secteur=$secteur;
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
    public function setDescription($description)
    {
        $this->description=$description;
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
    public function setCompany_name($company_name) 
    {
        $this->company_name=$company_name;
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
    public function setNb_post($nb_post)
    {
        $this->nb_post=$nb_post;
    }
    /**
     * @ORM\skills()
     * @ORM\Column(type="array")
     */
    private $skills;

    public function getSkills(){
        return $this->skills;
    }
    public function setSkills($skills){
        $this->skills=$skills;
    }
    /**
     * @ORM\tasks()
     * @ORM\Column(type="array")
     */
    private $tasks;

    public function getTasks(){
        return $this->tasks;
    }
    public function setTasks($tasks){
        $this->tasks=$tasks;
    }
    
}
