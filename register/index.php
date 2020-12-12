<?php
session_start();
require('../config/user.class.php');
require('../config/session.php');
if(check_session()){
  header('location:../myaccount');
}
if(isset($_POST['email'])){
  $user = new user();
  $create  = $user->add_user($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['password'],$_POST['phone']);
  if($create){
    $id = $user->check_login($_POST['email'],$_POST['password']);
    set_session_info($user->get_all_det($id));
    header('location:../myaccount/');
  }else{
    header('location:?error');
  }
}else{
  echo '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covoiturage</title>
    <link rel="stylesheet" href="../style/css/bootstrap.min.css">
    <script src="../style/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../">covoiturage</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../login/">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">register</a>
        </li>
      </ul>
    </div>
  </nav>
    <div class="container">
      <div class="row" style="padding-top:80px;">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
        ';
        if(isset($_GET["error"])){
          echo '
          <br><b>
          <span style="color:red;">erreur de creation du compte !</span>
          </b>
          <br><br><br>
          ';
        }
        echo'
          <form method="POST">
            <input type="text" class="form-control" name="fname" placeholder="nom"><br>
            <input type="text" class="form-control" name="lname" placeholder="prenom"><br>
            <input type="text" class="form-control" name="email" placeholder="e-mail"><br>
            <input type="password" class="form-control" name="password" placeholder="mot de passe"><br>
            <input type="text" class="form-control" name="phone" placeholder="numero de telephone"><br>
            <button type="submit" class="tn btn-primary">cree un compte</button>
          </form>
        </div>
        <div class="col-sm-3">   
        </div>
      </div>
    </div>
</body>
</html>
  ';
}
?>