<?php

require_once 'Framework/Modele.php';

// Services métier liés aux médicaments 
class Comptesrendus extends Modele {
    
    public function ajouterComptesrendus($idPraticien, $idVisiteur, $date, $bilan, $motif) {
        $sql = 'insert into rapport_visite(id_praticien, id_visiteur, date_rapport, bilan, motif)'
            . ' values(?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executerRequete($sql, array($idPraticien, $idVisiteur, $date, $bilan, $motif));
    }
}
    
