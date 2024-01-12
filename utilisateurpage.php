<?php
include("connextion.php");
     session_start();
     if(isset($_SESSION["email"])&&($_SESSION["email"]=="admin@gmail.com")){
      header("location:adminpage.php");
  }
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
    <title>Accueil</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/projetserveur/styleprojet/styleprojetutilisateurpage.css"> 
</head>
<body>
<div id="successAlert" class="alert alert-success" role="alert" style="display: none;">
    <strong>Success!</strong> You have been signed in successfully!
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        console.log("jQuery version:", $.fn.jquery);
        $("#successAlert").slideDown(500).delay(1800).slideUp(500, function() {
            $(this).remove();
        });
    });
</script>
<div class="background-carousel">
<header class="p-3 text-bg-dark" style="position: fixed; width: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 999;" >
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
      <li style="position: relative; left: 470px;"><div id='dropdown1' class=" dropdown " style="margin-left: 20px;">
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
<div class="motivation-text">
  <h1 id="motivation-heading" style="font-size:80px"></h1>
  <p id="motivation-paragraph"></p>
</div>
    <div>
      <button class="btn  btn-get-started" ><a id="buttton-get-started"  href="abonnement.php" >Unlock Your Fitness Plan</a></button>
    </div>
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
<script>
    const images = ['/projetserveur/images/jared-rice-NTyBbu66_SI-unsplash.jpg', '/projetserveur/images/jonathan-borba-zfPOelmDc-M-unsplash.jpg', '/projetserveur/images/venti-views-I1EWTM5mFEM-unsplash.jpg','/projetserveur/images/i-yunmai-Jus9GbnqhYQ-unsplash.jpg']; // Add your image URLs
    const motivationTexts = [
            { heading: "Discover Your Strength", paragraph: "Let us guide you through the transformation.." },
            { heading: "Elevate Your Limits", paragraph: "At our gym, we don't believe in limits; we believe in breaking barriers and reaching new heights." },
            { heading: "Stronger than yesterday.", paragraph: "Every day, we strive to be stronger than yesterday, pushing our limits and embracing growth." },
            { heading: "No pain, no gain", paragraph: "In the realm of fitness, no pain means no progress; it's the effort and sweat that pave the way for extraordinary gains." }
        ];
    let index = 0;

    function changeBackgroundImage() {
        index = (index + 1) % images.length;
        const backgroundImage = `url(${images[index]})`;
        const motivationHeading = motivationTexts[index].heading;
        const motivationParagraph = motivationTexts[index].paragraph;
        document.querySelector('.background-carousel').style.backgroundImage = backgroundImage;
        document.getElementById('motivation-heading').textContent = motivationHeading;
        document.getElementById('motivation-paragraph').textContent = motivationParagraph;
        setTimeout(changeBackgroundImage, 4000);
    }
    setTimeout(changeBackgroundImage, 0);
</script>
  </div>
</div>
<br><br><br>
<center>
    <blockquote class="blockquote">
        <p class="mb-0 ">"Smart planning turns athletes' dreams into reality. Every scheduled session is one step closer to victory."<strong>Michael Phelps</strong></p>    
    </blockquote><br><br>
    <header class="hero bg-dark text-white">
        <div class="container text-center">
    <h3>Plan for Success: Proven Strategies and Expert Advice</h3>
        </div>
    </header><br><br>
    <div class="container">
    <div class="row">
        <div class="col-sm-6 mb-4">
            <div class="card">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"/>
                    <image xlink:href="/projetserveur/images/food.png" width="100%" height="200" />
                </svg>
                <div class="card-body">
                    <h5 class="card-title">Balanced Nutrition</h5>
                    <p class="card-text">Adopt a diet rich in fruits, vegetables, lean proteins, and complex carbohydrates to support your workout goals.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-4">
            <div class="card">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"/>
                    <image xlink:href="/projetserveur/images/eau-potable-sportsman.jpg" width="100%" height="200" />
                </svg>
                <div class="card-body">
                    <h5 class="card-title">Hydratation</h5>
                    <p class="card-text">Assurez-vous de rester hydraté pendant toute la durée de l'entraînement.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 mb-4">
            <div class="card">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"/>
                    <image xlink:href="/projetserveur/images/hommes-s-echauffent-avant-apres-exercice.jpg" width="100%" height="200" />
                </svg>
                <div class="card-body">
                    <h5 class="card-title">Échauffement adéquat</h5>
                    <p class="card-text">Avant de commencer, échauffez-vous pendant au moins 10 minutes pour préparer vos muscles et éviter les blessures.</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-4">
            <div class="card">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"/>
                    <image xlink:href="/projetserveur/images/echauf.png" width="100%" height="200" />
                </svg>
                <div class="card-body">
                    <h5 class="card-title">Renforcement musculaire</h5>
                    <p class="card-text">Pratiquez des exercices de renforcement musculaire pour développer votre force et votre tonus musculaire.</p>
                </div>
            </div>
        </div>
    </div>
</div></center>
<br><br>
<svg xmlns="http://www.w3.org/2000/svg" class="d-none"> 
<symbol id="facebook" viewBox="0 0 16 16">
    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" fill="#FFFFFF"/>
</symbol>
<symbol id="instagram" viewBox="0 0 16 16">
 
    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" fill="#FFFFFF"/>
</symbol>
<symbol id="twitter" viewBox="0 0 16 16">
  
    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" fill="#FFFFFF"/>
</symbol>
</svg>
<div class="custom-container-bg">
<footer class="py-6 custom-container-bg" id="mu-footer ">
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget texting">
                <h4>Information</h4>
                <ul>
                  <li><a href="sports.php" class=" texting">our sports</a></li>
                  <li><a href="pagecoaches.php" class=" texting" id="coaches">our coaches</a></li>
                  <li><?php echo "<a href='mescoach.php ? id=$row[id]' class='texting' id='coacher'>my coach</a>"?></li>
                  <li><?php echo "<a href='messport.php ? id=$row[id]' class='texting' id='sporter'>my sport</a>"?></li>
                  <li><?php echo "<a href='mesabonnement.php ? id=$row[id]' class='texting' id='sporter'>my abonnement</a>"?></li>
                  <li id="about"><a href="aboutus.php" class="texting">FAQ</a></li>
                  
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget texting">
              <h4>subscribe</h4>
                <ul class="list-unstyled d-flex">
                    <li class="px-2"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                    <li class="px-2"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                    <li class="px-2"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 texting">
              <div class="mu-footer-widget">
                <h4>temps de travail</h4>
                <p>Monday 8:00 AM - 6:00 PM<br>
Tuesday
8:00 AM - 22:00 PM<br>
Wednesday
8:00 AM - 22:00 PM<br>
Thursday
8:00 AM - 22:00 PM<br>
Friday
8:00 AM - 22:00 PM<br>
Saturday
9:00 AM - 22:00 PM<br>
Sunday
9:00 AM - 17:00 PM</p>               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget texting">
                <h4><a class="texting"href="contact.php">Contact</a></h4>
                <address>
                  <p>652 Main Road, Apt 12 MHAMDEYA&nbsp;</p>
                  <p>GSM: (216) 58 470 604&nbsp;</p>
                  <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;(216) 72 230 607 </p>
                  <p>Email:  admin@gmail.com</p>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area texting ">
          <p>&copy; All Right Reserved. </p>
        </div>
      </div>
    </div>
  </footer>
  </div>
  </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</html>
