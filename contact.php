<?php
include("connextion.php");
     session_start();
     if(!isset($_SESSION["email"])){
        header("location:login.php");}
        if(isset($_GET['logout'])){
         
         session_destroy();
         header("location:login.php");
       }
       $email=$_SESSION["email"];
       $result = mysqli_query($con,"SELECT * FROM client where email='$email'");
       $row= mysqli_fetch_array($result);   
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/projetserveur/styleprojet/styleprojetutilisateurpage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-image:url('/projetserveur/images/back.png');background-size: cover;
  background-position: center;">
  <div><header class="p-3 text-bg-dark" style="position: fixed; width: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 999;" >
<div class="container ecrit">
  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      

    <ul class="js-scrollTo nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="background-color: rgba(0, 0, 0, 0.3); border-radius: 10px;height:40px; ">
      <li><img src="/projetserveur/images/logogym.png" alt="Logo de votre site" class="logo-container" style="left:-190px;"></li>  
      <li><a href="utilisateurpage.php" class="  js-scrollTo nav-link px-2 text-secondary">Home</a></li>
      <li><a href="sports.php" class=" js-scrollTo nav-link px-2 text-white">our sports</a></li>
      <li><a href="pagecoaches.php" class=" js-scrollTo nav-link px-2 text-white" id="coaches">our coaches</a></li>
      <li id="about"><a href="aboutus.php" class=" js-scrollTo nav-link px-2 text-white">FAQ</a></li>
      <li><?php echo "<a href='mescoach.php ? id=$row[id]' class=' nav-link px-2 text-white' id='coacher'>my coach</a>"?></li>
      <li><?php echo "<a href='messport.php ? id=$row[id]' class='  nav-link px-2 text-white' id='sporter'>my sport</a>"?></li>
      <li><?php echo "<a href='mesabonnement.php ? id=$row[id]' class='  nav-link px-2 text-white' id='sporter'>my abonnement</a>"?></li>
      <li style="position: relative; left: 510px;bottom:-10px;">
              <span  class=" js-scrollTo ml-3 font-weight-bold text-white" style="font-size: 18px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                <?php echo $row['nom']; ?>
              </span></li>
      <li style="position: relative; left: 510px;"><img src="<?php echo $row['image']; ?>" alt="User Image" class="js-scrollTo" style="width: 50px; height: 50px; border-radius: 100%; margin-left: 20px;"></li>
      <li style="position: relative; left: 500px;"><div id='dropdown1' class="js-scrollTo dropdown " style="margin-left: 20px;">
                <button class="hamburger-menu ">&#9776;</button>
              <div id="myDropdown" class="dropdown-content">
                <a href="changepaswd.php">Change Password</a>
                <a href="?logout">Log Out</a>
              </div>
          </div>
          </li>
        </div>
    </ul>
</div>
</header>
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
</div>
<br><br><br><br>
    <form action="" method="post" style="margin-left:30%;">
    <div class="page-header">
        <h2>Contact <small>Me Contacter</small></h2>
      </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="objectif" class="col-mx-3 control-label">objectif</label>
                    <input type="text" name="object" class="form-control" id="object">
                </div>

            </div>

        </div>
        <div class="form-group">
                <label for="messge" class="col-mx-3 control-label">message</label>
                <div class="col-md-6">
                  <textarea class="form-control" name="message" id=""></textarea>
                </div>
              </div>

            </div>
            <button name="btn" class="btn btn-primary">envoyer</button>
    </form>
    <?php 

include("connextion.php"); 

if (isset($_POST['btn'])) {
    $em = $_SESSION["email"];
    $res = mysqli_query($con, "SELECT * FROM client WHERE email='$em'");
    $rows = mysqli_fetch_array($res);
    $email = $rows['email'];

    $object = $_POST['object'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (object, message, email) VALUES ('$object', '$message', '$email')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Message envoyé.";
        
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>