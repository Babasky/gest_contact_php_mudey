<?php require_once 'templates/header.php'; ?>
    <div class="container">
        <h2 class="title">Mes contacts</h2>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Adresse">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Téléphone">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <input type="submit" class="btn btn-primary" value="Ajouter" name="submit">
        </form>
    </div>
<?php require_once 'templates/footer.php'; ?>


