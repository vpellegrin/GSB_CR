<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens
class Praticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien et type patricien
    private $sqlPraticien = 'select id_praticien as idPraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien, adresse_praticien as adressePraticien, cp_praticien as cpPraticien, coef_notoriete as coefNotoriete, ville_praticien as villePraticien, TP.id_type_praticien as idTypePraticien, lib_type_praticien as libTypePraticien, lieu_type_praticien as lieuTypePraticien  from PRATICIEN P join TYPE_PRATICIEN TP on P.id_type_praticien=TP.id_type_praticien';

    // Renvoie la liste des praticiens
    public function getPraticiens() {
        $sql = $this->sqlPraticien . ' order by nom_praticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }

    // Renvoie un praticien à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . ' where id_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }
    
    //Renvoie une liste de praticien a partir de l'id du type de praticien
    public function rechercherPraticiens($idTypePratricien) {
        $sql = $this->sqlPraticien. ' where TP.id_type_praticien=? order by p.nom_praticien';
        $typePraticiens = $this->executerRequete($sql, array($idTypePratricien));
        if ($typePraticiens->rowCount() != 0)
            return $typePraticiens;
        else
            throw new Exception("Aucun type de praticien ne correspond à l'identifiant '$idTypePraticien'");
            
        
        
    }
    

}
