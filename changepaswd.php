<?php 
session_start();
include("connextion.php");
if(!isset($_SESSION["email"])){
   header("location:login.php");}
   if(isset($_GET['logout'])){
    
    session_destroy();
    header("location:login.php");
  }
  $email=$_SESSION["email"];
  $result = mysqli_query($con,"SELECT * FROM client where email='$email'");
  $row= mysqli_fetch_array($result); 
$old_pas=$row['password'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/projetserveur/styleprojet/styleprojetutilisateurpage.css">
</head>
<body class="bg-light">
    <div><header class="p-3 text-bg-dark" style="position: fixed; width: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 999;" >
            <div class="container ecrit">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class=" nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="background-color: rgba(0, 0, 0, 0.3); border-radius: 10px;height:40px; ">
                <li><img src="/projetserveur/images/logogym.png" alt="Logo de votre site" class="logo-container" style="left:-190px;"></li>  
                <li><a href="utilisateurpage.php" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="sports.php" class=" nav-link px-2 text-white">our sports</a></li>
                <li><a href="pagecoaches.php" class="nav-link px-2 text-white" id="coaches">our coaches</a></li>
                <li id="about"><a href="aboutus.php" class="nav-link px-2 text-white">FAQ</a></li>
                <li><?php echo "<a href='mescoach.php ? id=$row[id]' class=' nav-link px-2 text-white' id='coacher'>my coach</a>"?></li>
                <li><?php echo "<a href='messport.php ? id=$row[id]' class='  nav-link px-2 text-white' id='sporter'>my sport</a>"?></li>
                <li><?php echo "<a href='mesabonnement.php ? id=$row[id]' class='  nav-link px-2 text-white' id='sporter'>my abonnement</a>"?></li>
                <li style="position: relative; left: 510px;bottom:-10px;">
                    <span  class=" js-scrollTo ml-3 font-weight-bold text-white" style="font-size: 18px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        <?php echo $row['nom']; ?>
                    </span></li>
                <li style="position: relative; left: 510px;"><img src="<?php echo $row['image']; ?>" alt="User Image" class="js-scrollTo" style="width: 50px; height: 50px; border-radius: 100%; margin-left: 20px;"></li>
                <li style="position: relative; left: 500px;">
                    <div id='dropdown1' class="js-scrollTo dropdown " style="margin-left: 20px;">
                        <button class="hamburger-menu ">&#9776;</button>
                        <div id="myDropdown" class="dropdown-content">
                        <a href="changepaswd.php">Change Password</a>
                        <a href="?logout">Log Out</a>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
            </div>
        </header>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $(".hamburger-menu").click(function(){
        $("#myDropdown").toggleClass("show");
    });

    $(document).click(function(event){
        if(!$(event.target).closest('.dropdown').length){
            if($('#myDropdown').hasClass('show')){
                $('#myDropdown').removeClass('show');
            }
        }
    });
});
</script> 
<br><br><br>
    <div class="container mt-5"><center>
        <h1>Update Password</h1><br>
        <?php
    if(isset($_POST['update_pas'])){
        $pas_old2 = $_POST['old_pas'];
        $new_pas = $_POST['new_pas'];
        if($pas_old2 == $old_pas){
            $update_pass = "UPDATE client SET password='$new_pas' WHERE email='$em'";
            mysqli_query($con, $update_pass);
            header("location:utilisateurpage.php");
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Please check the old password.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>';
        }
    }
    ?>
        <form method="POST">
            <div class="form-group">
            <div class="col-sm-4">
                <label for="old_pas">Old Password</label>
                <input width="" type="password" class="form-control" id="old_pas" name="old_pas" width required>
            </div></div>
            <div class="form-group">
                <label for="new_pas">New Password</label>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="new_pas" name="new_pas" required>
                </div>
            </div>
            <button name="update_pas" type="submit" class="btn btn-primary">Update Password</button>
        </form>
</center></div>

    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
