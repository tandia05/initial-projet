<?php

class Client
{
    // propriétés
    public $nom; // accessible depuis l'esterieu de la classe
    public $prenom;// accessible depuis l'esterieu de la classe
    private $nb_cb; // accessible à l'interieur de la classe par l'ensemble des methodes
    // mais innaccessible à l'exterieur , on fait recourt a la methode d'acces(getter) getNbCb();

    // méthodes
    // constructeur
    function __construct($nom, $prenom, $nb_cb)
    {
        // le nom des arguments fournis en entrée est arbitraire, ils ne doivent pas forcément être
        // identiques aux noms des propriétés

        // hydratation : on fournit des valeurs aux propriétés
        $this->nom = $nom;
        $this->prenom = $prenom;
        //$this->nb_cb = $nb_cb;  // Modificatio directe sans controle
        $this->setNbCb($nb_cb); //
    }

    Public function isCbValid()
    {
        // on retire les espaces éventuels
        $cb_no_spaces = str_replace(' ', '', $this->nb_cb);

        // on vérifie que le numéro de cb contient 16 caractères
        if (strlen($cb_no_spaces) == 16) {
            return true;
        } else {
            return false;
        }

    }
    // Methode non accessible depuis l'exterieur de la class
    Private function isCbOk($nb_cb)
    {
          // on retire les espaces éventuels
        $cb_no_spaces = str_replace(' ', '', $nb_cb);

        // on vérifie que le numéro de cb contient 16 caractères
        if (strlen($cb_no_spaces) == 16) {
            return true;
        } else {
            return false;
        }
    }

    // Accesseur (geteur)
    function getNbCb()
    {
        return $this->nb_cb;
    }

    // mutatteu (setteur)
    //modifier une propiete via une methode
    //permet d'effevtuer un controle avant de modifier
    Public function setNbCb($value)
    {
        if ($this->isCbOk($value))
        {
            $this->nb_cb = $value;
        }
        
    }

}

?>