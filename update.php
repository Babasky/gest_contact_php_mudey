<?php
require_once 'bd/create_table.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $bdd->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    $contact = $stmt->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'id à partir de l'URL

    $id = $_POST['id'];
    
    // Vérification des champs obligatoires
    if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['adresse']) || !isset($_POST['telephone']) || !isset($_POST['email'])) {
        echo 'Veuillez remplir tous les champs.';
        exit();
    } else {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $email = htmlspecialchars($_POST['email']);
    }
   
    // Mise à jour des données avec l'ID
    $stmt = $bdd->prepare("UPDATE contacts SET nom = ?, prenom = ?, adresse = ?, telephone = ?, email = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $adresse, $telephone, $email, $id]); 
    // print_r($stmt);
    // exit();
    header("Location: index.php");
}
?>
<?php require_once 'templates/header.php'; ?>
<div class="container">
    <h2 class="title">Modifier un contact</h2>
    <form action="update.php" method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $contact['nom']; ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $contact['prenom']; ?>">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="<?php echo $contact['adresse']; ?>">
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="<?php echo $contact['telephone']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $contact['email']; ?>">
        </div>
        <input type="submit" class="btn btn-primary" value="Modifier">
        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
    </form>
</div>
<?php require_once 'templates/footer.php'; ?>
