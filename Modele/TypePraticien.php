<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens
class TypePraticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien et type patricien
    private $sqlTypePraticien = 'select id_type_praticien, lib_type_praticien from type_praticien';

    // Renvoie la liste des praticiens
    public function getTypesPraticien() {
        $sql = $this->sqlTypePraticien . ' order by lib_type_praticien';
        $typesPraticien = $this->executerRequete($sql);
        return $typesPraticien;
    }
}
    
