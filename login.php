<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/projetserveur/styleprojet/stylelogin.css">
</head>
<body>
<ul>
<li style="list-style: none;"><a href="page1aceuil.php" class="nav-link px-2 text-secondary"style=" text-decoration:none;color:LightGray;">Home</a></li></ul>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-form">
                    <h1 class="text-center">Login</h1>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="passwd">Password</label>
                            <input type="password" name="passwd" class="form-control" required>
                        </div>
                        <button name="login" class="btn btn-primary btn-block" type="submit">Login</button><br>
                       <p> you dont have an account ? go <a href="user.php">Sign up</a></p>
                    </form>
 <?php
session_start();
        if(isset($_SESSION["email"])){
            header("location:utilisateurpage.php");
        }
        include("connextion.php");
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    if ($email === "admin@gmail.com" && $passwd === "admin") {
        $_SESSION["email"]=$email;
        header('location: adminpage.php');
    } else  {
        $sql = "SELECT * FROM client WHERE email='$email' AND password='$passwd'";
        $res = mysqli_query($con, $sql);
        
        $rows=mysqli_num_rows($res); 
        if ($rows==1) {
            $_SESSION['email'] = $email;
          
            header('location: utilisateurpage.php');
            
        } else {
            echo "Identifiants incorrects. Veuillez réessayer.";
        }
    }
}
?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
