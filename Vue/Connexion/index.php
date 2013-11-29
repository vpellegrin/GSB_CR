<?php $this->titre = "GSB-CR - Connexion" ?>



<div class="container">
        <h2 class="text-center">Connexion à GSB-CR</h2>
        
        <?php if (isset($msgErreur)): ?>
    <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Erreur !</strong> <?= $msgErreur ?>   
    </div>
<?php endif; ?>
    <div class="well">
        <form class="form-signin form-horizontal" role="form" action="connexion/connecter" method="post">
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <input name="login" type="text" class="form-control" placeholder="Entrez votre login" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <input name="mdp" type="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                </div>
            </div>
            <!--div class="form-group">
                <div class="col-sm-7 col-sm-offset-5">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="seSouvenir"> Se souvenir de moi
                        </label>
                    </div>
                </div>
            </div-->
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Connexion</button>
                </div>
            </div>
        </form>

    </div>

</div>



    