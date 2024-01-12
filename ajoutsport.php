<?php
session_start();
include("connextion.php");

$em = $_SESSION["email"];
$res = mysqli_query($con, "SELECT * FROM client WHERE email='$em'");
$rows = mysqli_fetch_array($res);

$ID = $_GET['id_sport'];
$result = mysqli_query($con, "SELECT * FROM sports WHERE id_sport='$ID'");
$row = mysqli_fetch_array($result);
$name = $row['nom_sport'];
$image = $row['image_sport'];

// Vérifiez si le sport existe déjà dans la table monsport pour cet utilisateur
$existingSportQuery = mysqli_query($con, "SELECT * FROM monsport WHERE nomsport='$name' AND iduser='$rows[id]'");
$existingSportRows = mysqli_num_rows($existingSportQuery);

if ($existingSportRows == 0) {
    // Le sport n'existe pas encore pour cet utilisateur, procédez à l'insertion
    $sql = "INSERT INTO monsport (nomsport, imagesport, iduser) VALUES ('$name', '$image', '$rows[id]')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo 'envoyé';
    } else {
        echo 'Erreur lors de l\'insertion : ' . mysqli_error($con);
    }
} else {
    echo '<script>';
    echo 'alert("You already have this sport.");';
    echo 'window.location.href = "sports.php";'; // Redirect to the coaches page
    echo '</script>';
    exit;
}
header("location: sports.php");
?>
