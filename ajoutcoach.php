<?php
session_start();
include("connextion.php"); 

$em = $_SESSION["email"];
$res = mysqli_query($con, "SELECT * FROM client WHERE email='$em'");
$rows = mysqli_fetch_array($res);

$ID = $_GET['id_coach'];
$result = mysqli_query($con, "SELECT * FROM coach WHERE id_coach='$ID'");
$row = mysqli_fetch_array($result);
$name = $row['nom_coach'];
$image = $row['image'];

$existingCoachQuery = mysqli_query($con, "SELECT * FROM mes_coach WHERE nom_coach='$name' AND user_id='$rows[id]'");
$existingCoachRows = mysqli_num_rows($existingCoachQuery);

if ($existingCoachRows == 0) {
    
    $sql = "INSERT INTO mes_coach (nom_coach, image, user_id,id_coach, situation) VALUES ('$name', '$image', '$rows[id]', '$ID','veiller patienter')";
    mysqli_query($con, $sql);

    if ($sql) {
        echo 'envoyé';
    }
} else {
    echo '<script>';
    echo 'alert("You already have this coach.");';
    echo 'window.location.href = "pagecoaches.php";'; 
    echo '</script>';
    exit;
}

header("location:pagecoaches.php");
?>
