<?php 
    //registration form
    if(isset($_POST['submit'])){
        require_once('connect.php');
        //basic security (real_escape_string) avoids SQL injection (' or 0=0 #)
        $username = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = sha1($_POST['password']);
        //Check if username exist else insert
        $check = $conn->query("SELECT username from users WHERE username = '$username' LIMIT 1");
        if($check->num_rows == 1) echo "<p class='alert'>Username already exists!</p>";
        else{
            $insert = "INSERT INTO users (username, email, `password`, score) VALUE ('$username', '$email', '$password', 0)";
            if($conn->query($insert)){
                echo "<p class='alert'>New user with name: ".$username." registered!</p>";
            }
            else{
                echo "<p class='alert'>Something went wrong</p>";
            }
        }
        //close connection
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User registration Tile of No Return</title>
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
                        <a class="nav-link" href="index.html">Tile of No Return </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tileofnoreturn.php">Play</a>
                    </li>
                    <li class="nav-item active">
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
            <div class="signup">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 text-center mt-5">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="needs-validation" novalidate>
                            <div class="form-row mb-3">
                                <input type="text" name="username" placeholder="Username" class="form-control" required>
                                <div class="invalid-feedback">
                                    <p class="alert">
                                        Please write a username
                                    </p>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                                <div class="invalid-feedback">
                                    <p class="alert">
                                        Please write an email
                                    </p>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <input type="text" name="password" placeholder="Password" class="form-control" required>
                                <div class="invalid-feedback">
                                    <p class="alert">
                                        Please write a password
                                    </p>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Register" class="btn">
                        </form> 
                    </div>
                </div>   
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </body>
</html>