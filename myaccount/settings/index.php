<?php
require_once('../../config/user.class.php');
require_once('../../config/session.php');
if(check_session()){
	$u = new user();
  if(isset($_POST['fname'])){
  	$u->modif_user($_SESSION['id'],$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['password'],$_POST['phone']);
    set_session_info($u->get_all_det($_SESSION['id']));
  	header('location:../');
  }else{
  	echo '
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covoiturage</title>
    <link rel="stylesheet" href="../../style/css/bootstrap.min.css">
    <script src="../../style/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../../">covoiturage</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../AddAnnonce/">ajouter annonce</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">settings</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right">
         <li class="nav-item">
          <a class="nav-link" href="../logout/">deconnection('.$_SESSION['fname'].' '.$_SESSION['lname'].')</a>
        </li>
      </ul>
    </div>
  </nav>
   <div class="container">
	   <div class="row" style="padding-top:80px;">
	        <div class="col-sm-3">
	        </div>
	        <div class="col-sm-6">
	        <form method="POST">
	              <input type="text" class="form-control" name="fname" placeholder="nom" value="'.$_SESSION['fname'].'"><br>
	              <input type="text" class="form-control" name="lname" placeholder="prenom" value="'.$_SESSION['lname'].'"><br>
	              <input type="text" class="form-control" name="email" placeholder="email" value="'.$_SESSION['email'].'"><br>
	              <input type="password" class="form-control" name="password" placeholder="nouveau mot de passe"><br>
	              <input type="text" class="form-control" name="phone" placeholder="telephone" value="'.$_SESSION['phone'].'"><br>
	              <button type="submit" class="tn btn-primary">modifier mes données</button>
	            </form>
	        </div>
	        <div class="col-sm-3">
	        </div>
	      </div>
	</div>
  </body>
  </html> 
  ';
  //fin du code page myaccount :
  }

}else{
  header('location:../login/');
}



?>