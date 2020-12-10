<?php
    //login 
    if(isset($_POST['submit'])){
        require_once("connect.php");
        $username = $conn->real_escape_string($_POST['username']);
        $password = sha1($_POST['password']);

        $read = "SELECT * FROM users WHERE username = '$username' AND `password` = '$password' LIMIT 1";
        $result = $conn->query($read);
        $conn->close();
        //check if query return anything, if not no match in database user has to register
        if(!$result->num_rows == 1){
            echo "<p class='alert'>Invalid username/password</p>";
        }
        else{
            //PHP session start
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['logged_in_user'] = $username;
            //redirect and stop present code
            header('Location: tileofnoreturn.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Tile of no return</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Tile of No Return</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tileofnoreturn.php">Play</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Register</a>
                    </li>
                </ul>
            </div>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="head">
                <div class="head text-center mt-5 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <img src="images/tileofnoreturn_title.png" alt="Tile of no return titel" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 text-center mt-5">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <br>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <br>
                            <input type="submit" class="btn" name="submit" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </body>
</html>