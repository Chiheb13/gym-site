<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/projetserveur/styleprojet/styleuser.css">
</head>
<body class="bg-light" >
<li style="list-style: none;"><a href="page1aceuil.php" class="nav-link px-2 text-primary  ">Home</a></li></ul>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h1 class="h1 mb-3 fw-normal text-center" style="color:white;">Create Your Gym Account</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom" style="color:white;">Name</label>
                    <input type="text" name="nom" class="form-control" id="nom" required>
                </div>
                <div class="form-group">
                    <label for="email" style="color:white;">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                </div>
                <div class="form-group">
                    <label for="passwd" style="color:white;">Password</label>
                    <input name="passwd" type="password" class="form-control" id="passwd" required>
                </div>
                <div style="color:white;">chouse your image<input type="file" class="form-control-file" name="imageuser" accept="image/*"style="padding:5px;"></div>
                <button name="add" class="btn btn-primary btn-block" type="submit">Create Account</button>
            </form>
            <?php
session_start();
include("connextion.php");

if(isset($_SESSION["email"])){
    header("location:utilisateurpage.php");
    exit();
}

if(isset($_POST['add'])){
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $up_image = $_FILES['imageuser']['tmp_name'];
    $imagename = $_FILES['imageuser']['name'];
    $imageup = 'imagesuser/' . $imagename;

    $emailExistsQuery = "SELECT * FROM client WHERE email = '$email'";
    $emailExistsResult = mysqli_query($con, $emailExistsQuery);

    if (mysqli_num_rows($emailExistsResult) > 0) {
        echo "Cette adresse Gmail est déjà associée à un compte. Veuillez utiliser une adresse différente.";
    } else {
        if(move_uploaded_file($up_image, $imageup)){
            $sql = "INSERT INTO client (nom, email, password, image) VALUES ('$name', '$email', '$passwd', '$imageup')";
            $result = mysqli_query($con, $sql);
            
            if($result){
                echo "Account created successfully.";
                header('location: login.php');
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "File upload failed.";
        }
    }
}
?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
