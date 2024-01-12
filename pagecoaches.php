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
    <title>coaches</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/projetserveur/styleprojet/styleprojetutilisateurpage.css">
    <link rel="stylesheet" href="/projetserveur/styleprojet/pagecoaches.css">
    </style>
    
</head>
<body ><div><header class="p-3 text-bg-dark" style="position: fixed; width: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 999;" >
<div class="container ecrit">
  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="background-color: rgba(0, 0, 0, 0.3); border-radius: 10px;height:40px; ">
      <li><img src="/projetserveur/images/logogym.png" alt="Logo de votre site" class="logo-container" style="left:-190px;"></li>  
      <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
      <li><a href="sports.php" class="nav-link px-2 text-white">our sports</a></li>
      <li><a href="pagecoaches.php" class="nav-link px-2 text-white" id="coaches">our coaches</a></li>
      <li id="about"><a href="aboutus.php" class="nav-link px-2 text-white">FAQ</a></li>
      <li><?php echo "<a href='mescoach.php ? id=$row[id]' class=' nav-link px-2 text-white' id='coacher'>my coach</a>"?></li>
      <li><?php echo "<a href='messport.php ? id=$row[id]' class='  nav-link px-2 text-white' id='sporter'>my sport</a>"?></li>
      <li><?php echo "<a href='mesabonnement.php ? id=$row[id]' class='  nav-link px-2 text-white' id='sporter'>my abonnement</a>"?></li>
      <li style="position: relative; left: 480px;bottom:-10px;">
              <span  class=" ml-3 font-weight-bold text-white" style="font-size: 18px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                <?php echo $row['nom']; ?>
              </span></li>
      <li style="position: relative; left: 470px;"><img src="<?php echo $row['image']; ?>" alt="User Image"  style="width: 50px; height: 50px; border-radius: 100%; margin-left: 20px;"></li>
      <li style="position: relative; left: 460px;"><div id='dropdown1' class=" dropdown " style="margin-left: 20px;">
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
</script></div>
    <div class="conteneur">
    <div  class="motivation-text"style="background-color:#444;text-align: center;margin-top: 320px;">
        
        <p id="motivation-paragraph"  >Get a 15% discount on your first session with a private coach!</p>    
    </div>
    </div>
    <p id="titre">The team of professionals</p>
    <div >
        <button class="btn  btn-get-started" style="bottom:855px;" ><a id="buttton-get-started"  href="#coaches-container" >check the team</a></button>
    </div>
<div id="coaches-container" class="coach-container">
    <?php
    include("connextion.php");
    $sql = "SELECT * FROM coach";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="coach-card">';
        echo '<img src="' . $row['image'] . '" alt="' . $row['nom_coach'] . '">';
        echo '<p><a href="#">' . $row['nom_coach'] . '</a></p>';
        echo "<a href='ajoutcoach.php?id_coach=$row[id_coach]' class='btn btn-primary'>Get It</a>";
        echo '</div>';
    }
    mysqli_close($con);
    ?>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>