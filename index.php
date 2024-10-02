<?php require_once 'templates/header.php'; ?>
<?php  require_once 'bd/create_table.php'; ?>
<?php
    if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);

    // Vérification des champs obligatoires
    if(empty($nom) && !preg_match('/^[a-zA-Z\s]+$/', $nom)){
        echo 'Le champ nom est obligatoire et doit contenir des lettres et des espaces.';
        exit();
    }
    if(empty($prenom) && !preg_match('/^[a-zA-Z\s]+$/', $prenom)){
       echo 'Le champ prénom est obligatoire et doit contenir des lettres et des espaces.';
       exit();
    }
    if(empty($adresse) && !preg_match('/^[a-zA-Z\s]+$/', $adresse)){
        echo 'Le champ adresse est obligatoire et doit contenir des lettres et des espaces.';
        exit();
    }
    if(empty($telephone) && !preg_match('/^[0-9\s]+$/', $telephone)){
       echo 'Le champ téléphone est obligatoire et doit contenir des chiffres et des espaces.';
       exit();
    }
    if(empty($email) && !preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)){
       echo 'Le champ email est obligatoire et doit contenir une adresse email valide.';
       exit();
    }

    $stmt = $bdd->prepare("INSERT INTO contacts (nom, prenom, adresse, telephone, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $adresse, $telephone, $email]);
    //header('location: contact.php');
}
?>
<div class="container">
    <div class="add-contact">
        <h2 class="add-title">Mes contacts</h2>
        <a href="add-contact.php">
            <button class="btn btn-primary">Ajouter un contact</button>
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $resultat = $bdd->query("SELECT * FROM contacts ORDER BY id DESC");
                $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
                //var_dump($donnees);
            ?>
            <?php foreach($donnees as $donnee){ ?>
                <tr>
                    <td><?php echo $donnee['nom']; ?></td>
                    <td><?php echo $donnee['prenom']; ?></td>
                    <td><?php echo $donnee['adresse']; ?></td>
                    <td><?php echo $donnee['telephone']; ?></td>
                    <td><?php echo $donnee['email']; ?></td>
                    <td class="actions">
                        <a href="update.php?id=<?php echo $donnee['id']; ?>" class="btn btn-primary">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="delete.php?id=<?php echo $donnee['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
    </table>
</div>
<?php require_once 'templates/footer.php'; ?>