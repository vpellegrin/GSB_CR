<?php

require_once 'Framework/Modele.php';

// Services métier liés aux médicaments 
class Comptesrendus extends Modele {
    
    
    // Morceau de requête SQL incluant les champs de la table comptes rendu et praticien
    private $sqlComptesRendus = 'select id_rapport as idRapport, RV.id_praticien as idPraticien, id_visiteur as idVisiteur, date_rapport as dateRapport, motif as motifRapport, bilan as bilanRapport, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien, ville_praticien as villePraticien from PRATICIEN P join rapport_visite RV on P.id_praticien=RV.id_praticien';
    // Renvoie la liste des comptes rendus
    public function getComptesRendus() {
        $sql = $this->sqlComptesRendus . ' order by nom_praticien';
        $comptesRendus = $this->executerRequete($sql);
        
        return $comptesRendus;
        
    }
    
    // Renvoie la liste des comptes rendus
    public function getCompteRendu($idRapport) {
        $sql = $this->sqlComptesRendus . ' WHERE id_rapport=?';
        
        $compteRendu = $this->executerRequete($sql, array($idRapport));
        if ($compteRendu->rowCount() == 1)
            return $compteRendu->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun comptes rendus ne correspond à l'identifiant '$idRapport'");
    }
    
    
            
            public function modifierComptesrendus($idRapport, $bilan, $motif) {
        $sql = 'update rapport_visite set bilan=?, motif=? where id_rapport=?';
        $this->executerRequete($sql, array($bilan, $motif, $idRapport));
    }
    
    
    
    
    public function ajouterComptesrendus($idPraticien, $idVisiteur, $date, $bilan, $motif) {
        $sql = 'insert into rapport_visite(id_praticien, id_visiteur, date_rapport, bilan, motif)'
            . ' values(?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executerRequete($sql, array($idPraticien, $idVisiteur, $date, $bilan, $motif));
    }
    
    public function supprimerComptesrendus($idRapport) {
        $sql = 'delete from rapport_visite WHERE id_rapport=?';
        $this->executerRequete($sql, array($idRapport));
    }
    
    
    
}
    
