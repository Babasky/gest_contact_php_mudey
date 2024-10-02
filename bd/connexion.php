<?php
try {
    $bdd = new PDO('sqlite:contacts.db');
    // Activer les erreurs PDO
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



?>
