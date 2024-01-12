<?php 

include('connextion.php');
$ID=$_GET['id_coach'];
$update="UPDATE mes_coach set situation='refuser' WHERE id_coach=$ID";
mysqli_query($con,$update);
header("location:adminpage.php");
?>