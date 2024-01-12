<?php 
include('connextion.php');
$ID=$_GET['id_coach'];
$update="UPDATE mes_coach set situation='accepter' WHERE id_coach=$ID";
mysqli_query($con,$update);
header("location:adminpage.php");
?>