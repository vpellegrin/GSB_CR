<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center"><?= $this->nettoyer($praticien['nomPraticien']) . ' ' . $this->nettoyer($praticien['prenomPraticien']) ?></h2>
    <div class="well">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-3 control-label">Adresse</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['adressePraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Code Postal</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['cpPraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ville</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['villePraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Notoriété</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['coefNotoriete']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Type Praticien</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['libTypePraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Lieu Praticien</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['lieuTypePraticien']) ?></p>
                </div>
            </div>
        </form>
    </div>    
</div>

