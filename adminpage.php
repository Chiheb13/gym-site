<?php
session_start();
if(!isset($_SESSION["email"])){
    header("location:login.php");}
if(isset($_SESSION["email"])&&($_SESSION["email"]!="admin@gmail.com")){
    header("location:utilisateurpage.php");
}
if(isset($_GET['logout'])){
          
    session_destroy();
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/projetserveur/styleprojet/styleprojetutilisateurpage.css">
    <style>
        .coach-form-container {
            background-image: url('/projetserveur/images/back.png');
            background-size: cover;
            background-position: center;
            padding: 20px;
            color: #fff;
        }
    </style>
</head>
<body>
<div>
    <header class="p-3 text-bg-dark" style="position: fixed; width: 100%; z-index: 999;" >
      <div class="container ecrit">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="js-scrollTo nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style=" border-radius: 10px; ">
                <li><a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="/projetserveur/images/logogym.png" alt="Logo de votre site" class="logo-container" style="left: -150px;">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a></li>  
                <div id='dropdown1' class="js-scrollTo dropdown " style="left: 1200px;">
                    <button class="hamburger-menu ">&#9776;</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="?logout">Log Out</a>
                    </div>
                </div>
            </ul></div>
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
<div class="bg-dark text-white text-center py-4">
    <h1>Ma Salle de Sport</h1>
    <p class="lead">Votre santé, notre priorité.</p>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card coach-form-container">
                <div class="card-body">
                    <h2 class="card-title" style="color:black;">Ajouter un nouveau coach</h2>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomcoach" style="color:black;">Nom du coach :</label>
                            <input type="text" class="form-control" name="nomcoach" required>
                        </div>
                        <div class="form-group">
                            <label for="imagecoach" style="color:black;">Image du coach :</label>
                            <input type="file" class="form-control-file" name="imagecoach" accept="image/*" required>
                        </div>
                        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter Coach</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card coach-form-container">
                <div class="card-body">
                    <h2 class="card-title" style="color:black;">Ajouter un nouveau sport</h2>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomsport" style="color:black;">Nom du sport :</label>
                            <input type="text" class="form-control" name="nomsport" required>
                        </div>
                        <div class="form-group">
                            <label for="imagesport" style="color:black;">Image du sport :</label>
                            <input type="file" class="form-control-file" name="imagesport" accept="image/*" required>
                        </div>
                        <button type="submit" name="ajouter_sport" class="btn btn-primary">Ajouter Sport</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card coach-form-container">
                <div class="card-body">
                    <h2 class="card-title" style="color:black;">Ajouter abonnement</h2>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomabonnement" style="color:black;">Nom abonnement :</label>
                            <input type="text" class="form-control" name="nomabonnement" required>
                            <label for="price" style="color:black;">price :</label>
                            <input type="text" class="form-control" name="price" required>
                            <label for="description" style="color:black;">description :</label>
                            <input type="text" class="form-control" name="desc" required>

                        </div>
                        <button type="submit" name="ajouter_abonnement" class="btn btn-primary">Ajouter abonnement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br><br><br><hr class="hr-dashed">
<?php
if(isset($_GET['logout'])){
          
    session_destroy();
    header("location:login.php");
  }
include("connextion.php");
$res = mysqli_query($con,"SELECT * FROM mes_coach");?>

  <center>
  
<table class="table table-bordered" border='1'>
<thead class="thead-dark">
<tr>
<th>nom</th>
<th>image</th>
<th>user id</th>
<th>situation</th>
<th>reponse</th>
</tr>
</thead>
<?php
echo "<h2>coach</h2>";
while( $rows= mysqli_fetch_array($res)){
echo '<tr>';
echo '<td>'.$rows['nom_coach'].'</td>';
echo '<td>'.$rows['image'].'</td>';
echo '<td>'.$rows['user_id'].'</td>';
echo '<td>'.$rows['situation'].'</td>';
echo "<td> <a class='btn btn-danger'  href='refuser.php? id_coach=$rows[id_coach]'>refuser</a><a class='btn btn-success'  href='valider.php? id_coach=$rows[id_coach]'>accepter</a> </td>";
echo '</tr>';
}

?>
</table></center>
</form><br><hr class="hr-dashed">
<?php
include("connextion.php");

$query = "SELECT * FROM contact WHERE admin_response IS NULL OR admin_response = ''";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='container mt-5'>";
    echo "<h2>Messages sans réponse :</h2>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Object</th>";
    echo "<th>Message</th>";
    echo "<th>Email</th>";
    echo "<th>Répondre</th>"; 
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['object'] . "</td>";
        echo "<td>" . $row['message'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>"; 
        echo "<form method='POST'>";
        echo "<input type='hidden' name='message_id' value='" . $row['id'] . "'>"; // Champ caché pour l'ID du message
        echo "<textarea name='admin_response' placeholder='Répondre...' class='form-control'></textarea>";
        echo "<button type='submit' name='submit_response' class='btn btn-primary mt-2'>Envoyer</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<p>Aucun message sans réponse trouvé.</p>";
}

if (isset($_POST['submit_response'])) {
    $messageId = $_POST['message_id'];
    $adminResponse = $_POST['admin_response'];

    $insertResponseQuery = "UPDATE contact SET admin_response='$adminResponse' WHERE id=$messageId";

    if (mysqli_query($con, $insertResponseQuery)) {
        echo "<script>alert('Réponse ajoutée avec succès.')</script>";
    } else {
        echo "Erreur lors de l'ajout de la réponse : " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2023 Ma Salle de Sport</p>
</footer>
<?php
include("connextion.php");

if (isset($_POST['ajouter'])) {
    $nomcoach = $_POST['nomcoach'];
    $images=$_FILES['imagecoach'];
    $up_image=$_FILES['imagecoach']['tmp_name'];
    $imagename=$_FILES['imagecoach']['name'];
    $imageup='images/'.$imagename;
   
    $sql = "INSERT INTO coach (nom_coach, image) VALUES ('$nomcoach', '$imageup')";

    if(mysqli_query($con, $sql) && move_uploaded_file($up_image,'images/'.$imagename)) {
        echo "Coach ajouté avec succès à la base de données.";
    } else {
        echo "Erreur lors de l'ajout du coach : " . mysqli_error($con);
    }

    mysqli_close($con);
}

if (isset($_POST['ajouter_sport'])) {
    $nomsport = $_POST['nomsport'];
    $imagesport = $_FILES['imagesport'];
    $up_image_sport = $_FILES['imagesport']['tmp_name'];
    $imagename_sport = $_FILES['imagesport']['name'];
    $imageup_sport = 'imagessport/' . $imagename_sport;

    $sql_sport = "INSERT INTO sports (nom_sport, image_sport) VALUES ('$nomsport', '$imageup_sport')";

    if (mysqli_query($con, $sql_sport) && move_uploaded_file($up_image_sport, 'imagessport/' . $imagename_sport)) {
        echo "Sport ajouté avec succès .";
    } else {
        echo "Erreur lors de l'ajout du sport : " . mysqli_error($con);
    }

    mysqli_close($con);
}
if (isset($_POST['ajouter_abonnement'])) {
    $nomabonnement = $_POST['nomabonnement'];
    $priceabonnement = $_POST['price'];
    $descabonnement = $_POST['desc'];

    $sql_abonnement = "INSERT INTO abonnement (nom_abonnement,description,price) VALUES ('$nomabonnement', '$descabonnement','$priceabonnement')";

    if (mysqli_query($con, $sql_abonnement) ) {
        echo "abonnement ajouté avec succès .";
    } else {
        echo "Erreur lors de l'ajout du abonnement : " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
