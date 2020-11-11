<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nordlid landingpage</title>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>

    

    <div class="container-fluid header">
        <div class="container p-0">
            <nav class="navbar p-0">
                <a class="navnbar-brand" href="#">
                    <img src="Nordlid_logo_thicker_black_WEB.png" alt="Nordlid logo">
                </a>
            </nav>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="slider col-sm-12 col-md-12 p-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 img-fluid" src="12.png" alt="Blue sky with clouds">
                            <div class="carousel-caption">
                                <h1>Lorem ipsum dolor sit amet, 
                                    <br>
                                    consectetur adipiscing elit, sed do 
                                    <br>
                                    eiusmod tempor incididunt ut</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="17.png" alt="walking up stairs">
                            <div class="carousel-caption">
                                <h1>Lorem ipsum dolor sit amet, 
                                    <br>
                                    consectetur adipiscing elit, sed do 
                                    <br>
                                    eiusmod tempor incididunt ut</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="1.png" alt="Man talking on the phon">
                            <div class="carousel-caption">
                                <h1>Lorem ipsum dolor sit amet, 
                                    <br>
                                    consectetur adipiscing elit, sed do 
                                    <br>
                                    eiusmod tempor incididunt ut</h1>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid con1 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0 pb-5 pt-5">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</h2>
                </div>   
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 p-0 order-2 order-md-1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 p-0 order-1 order-md-2">
                    <p>
                        dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
                    </p>
                    <form action="index.php" method="post" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="validationname">Navn</label>
                            <input type="text" name="name" id="validationname" class="form-control" value="" required>
                            <div class="invalid-feedback">
                                UPS! Du mangler at udfylde noget.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationemail">E-mail</label>
                            <input type="email" Name="email" id="validationemail" class="form-control" required>
                            <div class="invalid-feedback">
                                UPS! Du mangler at udfylde noget.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationphone">Tlf</label>
                            <input type="number" Name="phone" id="validationphone" class="form-control" required>
                            <div class="invalid-feedback">
                                UPS! Du mangler at udfylde noget.
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="" id="tjek" required>
                            <label class="form-check-label" for="tjek">
                                Jeg giver hermed tilladelse til, at Nordlid må gemme og bruge min data til interne projekter. Jeg kan til hver en tid tilbagekalde min accept.
                            </label>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn knap">SEND</button>
                    </form>
                    <?php
                        //Server connection
                        $conn = new mysqli('localhost:3306', 'root', '', 'nordlid');

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connection_error);
                        }

                        //Post data to database
                        if(isset($_POST['submit'])){
                            
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];

                            $sql = "INSERT INTO users (Fname,Email,Phone) VALUES ('$name','$email','$phone')";

                            //check if data transfered
                            if (mysqli_query($conn, $sql)){
                                echo "<p>Dine oplysninger er modtaget!</p>";
                            }else{
                                echo "ERROR: " . $sql . ":-" . mysqli_error($conn);
                            }
                        }
                        //close connection
                        mysqli_close($conn);
                    ?>
                </div>
            </div>
            
        </div>
    </div>
    <div class="container-fluid con2 pt-5 pb-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12 col-md-4">
                    <img src="icon-light-bulb.png" alt="Lightbulb icon">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <img src="icon-speech-bubble.png" alt="Speech bubble icon">
                    <p>
                        Eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <img src="icon-gold-medal.png" alt="Goldmedal icon">
                    <p>
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer pt-5 pb-5">
        <div class="container p-0">
            <div class="row">
                <div class="col-sm-12 col-md-6 p-0">
                    <img src="contact-footer.png" alt="contact information">
                </div>
                <div class="col-sm-12 col-md-6 p-0">
                    <div class="row">
                        <div class="col text-center socials">
                            <a href="#"><img src="facebook-logo-button.png" alt="Facebook logo" class="social"></a>
                            <a href="#"><img src="linkedin.png" alt="Linkedin logo" class="social"></a>
                            <a href="#"><img src="instagram.png" alt="Instagram logo" class="social"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="validation.js"></script>
</body>
</html>