<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/Comptesrendus.php';

// Contrôleur des actions liées aux médicaments
class ControleurComptesrendus extends ControleurSecurise {
    
  // Objet modèle Comptesrendus
    private $comptesRendus;
    private $praticiens;

    public function __construct() {
        $this->comptesRendus = new Comptesrendus();
        $this->praticiens = new Praticien();
    }

    // Affiche la liste des comptes rendus
    public function index() {
        $comptesRendus = $this->comptesRendus->getComptesRendus();
        $msgErreur = "Vous n'avez saisi aucun compte-rendu de visite";
        
        if ($comptesRendus->rowCount() < 1)
            $this->genererVue(array('msgErreur' => $msgErreur));
        else
            $this->genererVue(array('comptesRendus' => $comptesRendus));
            
            
        
    }
    
    // Affiche la liste des praticiens
    public function ajout() {
        $praticiens = $this->praticiens->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    //recupere les données du formulaire et les renvoies a la methode ajouterComptesrendus
    public function ajouter() {
        $idPraticien = $this->requete->getParametre("idPraticien");
        $idVisiteur = $this->requete->getSession()->getAttribut('idVisiteur');
        $date = $this->requete->getParametre("date");
        $motif = $this->requete->getParametre("motif");
        $bilan = $this->requete->getParametre("bilan");
        
        $this->comptesRendus->ajouterComptesrendus($idPraticien, $idVisiteur, $date, $bilan, $motif);
        
        $this->genererVue();
    }
    
    //recupere les données du formulaire et les renvoies a la methode modifierComptesrendus
    public function modification() {
        $idRapport = $this->requete->getParametre("id");
        
        
        $compteRendu = $this->comptesRendus->getCompteRendu($idRapport);
        $this->genererVue(array('compteRendu' => $compteRendu));
    }
    
    public function modifier() {
        $idRapport = $this->requete->getParametre("idRV");
        $motif = $this->requete->getParametre("motif");
        $bilan = $this->requete->getParametre("bilan");
        
        $this->comptesRendus->modifierComptesrendus($idRapport, $bilan, $motif);
        
        $this->genererVue();
    }
    
    public function supprimer() {
        $idRapport = $this->requete->getParametre("id");
        $this->comptesRendus->supprimerComptesrendus($idRapport);
        $this->rediriger("comptesrendus");
        
    }
}