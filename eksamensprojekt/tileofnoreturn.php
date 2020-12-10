<?php
    
    session_start();
    if($_SESSION['logged_in']==true){
      if(isset($_POST['highscore'])){
        require_once('connect.php');
        $score = $_POST['highscore'];
        $sql = $conn-> prepare("update users set score = ? where username = ? and score < ? limit 1");
        $sql->bind_param('isi', $score, $_SESSION['logged_in_user'], $score);
        $sql->execute();
      }
?>
    <!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tile of No Return</title>
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
                <li class="nav-item active">
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
          <div class="head text-center mt-5 mb-5">
              <div class="row">
                  <div class="col-12">
                      <img src="images/tileofnoreturn_title.png" alt="Tile of no return titel" class="img-fluid">
                  </div>
              </div>
          </div>
          <div class="content">
              <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-4 order-sm-3 order-md-2 order-lg-1 text-center">
                      <div class="otherusers">
                          <div class="row">
                              <div class="col-md-12">
                                  <h2>Scoreboard:</h2>
                              </div>
                              <div class="col-md-12">
                                <?php
                                  require_once('connect.php');
                                  $sqlline = 'select * from users order by score desc limit 10';
                                  $result = $conn->query($sqlline);
                                  if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                      echo "<p>".$row["username"].": ".$row["score"]."</p>";
                                    }
                                  }
                                ?>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-4 order-sm-1 order-md-1 order-lg-2 text-center mb-4">
                      <canvas width="500" height="500" id="canvas"></canvas>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-4 order-sm-2 order-md-3 order-lg-3 text-center">
                      <div class="controlcenter">
                          <div class="row">
                              <div class="col-md-12">
                                  <h2>Control Center</h2>
                              </div>
                              <div class="col-md-12 mt-2 mb-2">
                                <?php
                                    echo "<h3>User: ".$_SESSION['logged_in_user']."</h3>"
                                  ?>
                              </div>
                              <div class="col-md-12">
                                <h3>Controls:</h3>
                                <img src="images/Arrowkeys.png" alt="arrowkeys" class="img-fluid arrows">
                              </div>
                              <div class="col-md-12">
                                  <h3>Current Score:</h3>
                                  <p id="cscore">0</p>
                              </div>
                              <div class="col-md-12">
                                <h3>Your best score:</h3>
                                <?php
                                  require_once('connect.php');
                                  $sqlline = $conn->prepare('select score from users where username = ?');
                                  $sqlline->bind_param('s', $_SESSION['logged_in_user']);
                                  $sqlline->execute();
                                  $result = $sqlline->get_result();
                                  if($result->num_rows > 0 ){
                                    while($row = $result->fetch_assoc()){
                                      echo "<p>".$row["score"]."</p>";
                                    }
                                  }
                                ?>
                                <!-- <p id="displayscore">0</p> -->
                              </div>
                              <div class="col-md-12 mb-3">
                                <a href="logout.php" type="button" class="btn">Logout</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--hidden input -->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="hscoreform" method="post" style="display:none">
        <input type="number" id="hscore" name="highscore">
        <input type="submit">
      </form>

      <!--modal for getting stuck and restart-->
      <div class="modal fade" id="stuckModal" tabindex="-1" role="dialog" aria-labelledby="stucktitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="stucktitle">Oh no!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>
                  Your spaceship is stuck! Restart the game...
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn gamerestart" data-dismiss="modal">Restart</button>
              </div>
            </div>
          </div>
        </div>
        <!--modal for winning and restart-->
        <div class="modal fade" id="winModal" tabindex="-1" role="dialog" aria-labelledby="wintitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="wintitle">Congratulation!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>
                  You have steered your spaceship through the astoroids succesfully and are now out of danger!
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn gamerestart" data-dismiss="modal">Play again?</button>
              </div>
            </div>
          </div>
        </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="main.js"></script>
  </body>
</html>
<?php
        
    }
    else{
        header('Location: login.php');
    }
?>