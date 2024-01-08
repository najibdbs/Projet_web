<?php

// Instancier le modèle FormulaireModel
class FormulaireModel
{
    // Propriétés pour stocker les données du formulaire
    private $email;
    private $emailPerso;
    private $tel;
    private $problemType;
    private $materiel;
    private $local;
    private $urgence;
    private $remarque;

    // Constructeur de la classe
    public function __construct()
    {
        // Initialisation des propriétés
        $this->email = '';
        $this->emailPerso = '';
        $this->tel = '';
        $this->problemType = '';
        $this->materiel = '';
        $this->local = '';
        $this->urgence = 1; // Par défaut, on initialise à "Moins urgent" (valeur 1)
        $this->remarque = '';
    }

    // Méthodes pour accéder aux propriétés (getters) et les modifier (setters)
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmailPerso()
    {
        return $this->emailPerso;
    }

    public function setEmailPerso($emailPerso)
    {
        $this->emailPerso = $emailPerso;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getProblemType()
    {
        return $this->problemType;
    }

    public function setProblemType($problemType)
    {
        $this->problemType = $problemType;
    }

    public function getMateriel()
    {
        return $this->materiel;
    }

    public function setMateriel($materiel)
    {
        $this->materiel = $materiel;
    }

    public function getLocal()
    {
        return $this->local;
    }

    public function setLocal($local)
    {
        $this->local = $local;
    }

    public function getUrgence()
    {
        return $this->urgence;
    }

    public function setUrgence($urgence)
    {
        $this->urgence = $urgence;
    }

    public function getRemarque()
    {
        return $this->remarque;
    }

    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;
    }
}
?>