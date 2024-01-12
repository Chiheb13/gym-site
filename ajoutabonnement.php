<?php
session_start();
include("connextion.php"); 

$em = $_SESSION["email"];
$res = mysqli_query($con, "SELECT * FROM client WHERE email='$em'");
$rows = mysqli_fetch_array($res);

$ID = $_GET['id_abonnement'];
$result = mysqli_query($con, "SELECT * FROM abonnement WHERE id_abonnement='$ID'");
$row = mysqli_fetch_array($result);
$name = $row['nom_abonnement'];
$desc = $row['description'];


$existingabonnementQuery = mysqli_query($con, "SELECT * FROM monabonnement WHERE nom_abonnement='$name' AND id_user='$rows[id]'");
$existingabonnementRows = mysqli_num_rows($existingabonnementQuery);

if ($existingabonnementRows == 0) {
    $sql = "INSERT INTO monabonnement (nom_abonnement, description, id_user) VALUES ('$name', '$desc', '$rows[id]')";
    mysqli_query($con, $sql);

    if ($sql) {
        echo 'envoyé';
    }
} else {
    echo '<script>';
    echo 'alert("You already have your session.");';
    echo 'window.location.href = "abonnement.php";'; 
    echo '</script>';
    exit;
}

header("location:abonnement.php");
?>
