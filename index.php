<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covoiturage</title>
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <script src="style/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">covoiturage</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
        require_once('config/session.php');
        if(check_session()){
          echo '
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="myaccount">mon compte</a>
            </li>
          </ul>
      <ul class="navbar-nav navbar-right">
         <li class="nav-item">
          <a class="nav-link" href="myaccount/logout/">deconnection('.$_SESSION['fname'].' '.$_SESSION['lname'].')</a>
        </li>
      </ul>';
        }else{
          echo '<ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="login/">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register/">register</a>
        </li>
      </ul>';
        }
      ?>



    </div>
  </nav>
  <div class="container">
      <div style="text-align: center;padding-top: 27px;">
        <h3>Bienvenue</h3>
      </div>
    
    <div class="row" style="padding-top:80px;">

  <?php
  require_once("config/annonce.class.php");
  $a = new annonce();
        foreach($a->getAllAnnonces() as $row){
          echo '
            <div class="col-sm-3">
              <div class="card">
                <div class="card text-white bg-primary">
                  <div class="card-header">
                    <b>De</b> '.$row['fromd'].' <b>A</b> '.$row['tod'].'
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">'.$row['date'].'</h5>
                    <p class="card-text">
                      nombre des places : '.$row['places'].'<br>
                      prix par place : '.$row['price'].' DT
                    </p>
                    <a href="detailes/?'.$row['id'].'" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">afficher plus</a>
                  </div>
                </div>  
            </div> 
          </div>          
          ';
        }
        echo '
      </div>
    </div>
</body>
';

  ?>
</body>
</html>
