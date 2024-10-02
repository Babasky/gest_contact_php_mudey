<?php

require_once 'bd/create_table.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = $bdd->prepare("DELETE FROM contacts WHERE id = ?");
    $sql->execute([$id]);
    header("Location: index.php");
}

?>  
