<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/TypePraticien.php';

// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends Controleur {

    // Objet modèle Praticien
    private $praticien;
    private $typePraticien;

    public function __construct() {
        $this->praticien = new Praticien();
        $this->typePraticien = new TypePraticien();
    }

    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    // Affiche les informations détaillées sur un praticien
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    // Affiche l'interface de recherche de praticien
    public function recherche() {
        $praticiens = $this->praticien->getPraticiens();
        $typesPraticien = $this->typePraticien->getTypesPraticien();
        $this->genererVue(array('praticiens' => $praticiens, 'types' => $typesPraticien));
    }

    // Affiche le résultat de la recherche de praticien
    public function resultat() {
        if ($this->requete->existeParametre("idPraticien")) {
            $idPraticien = $this->requete->getParametre("idPraticien");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    
    // Affiche le résultat de la recherche de praticien avancee
    public function resultats() {
        if ($this->requete->existeParametre("idTypePraticien")) {

            $nomPraticien = null;
            $villePraticien = null;
            if ($this->requete->existeParametre("nom")) {
                $nomPraticien = $this->requete->getParametre("nom");
            }
            if ($this->requete->existeParametre("ville")) {
                $villePraticien = $this->requete->getParametre("ville");
            }
            $idTypePraticien = $this->requete->getParametre("idTypePraticien");
            $this->afficherType($idTypePraticien, $nomPraticien, $villePraticien);
        }
        else
            throw new Exception("Action impossible : aucun type défini");
    }

    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }

    // Affiche les détails sur un praticien
    private function afficherType($idTypePraticien, $nomPraticien, $villePraticien) {
        $praticiens = $this->praticien->rechercherPraticiens($idTypePraticien, $nomPraticien, $villePraticien);
        $this->genererVue(array('praticiens' => $praticiens), "index");
    }

}

?>