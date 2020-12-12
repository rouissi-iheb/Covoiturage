<?php
require_once('../../config/annonce.class.php');
require_once('../../config/session.php');
if(check_session()){
	$a = new annonce();
  if(isset($_POST['from'])){
  	$a->addAnnonce($_SESSION['id'],$_POST['from'],$_POST['to'],$_POST['date'],$_POST['places'],$_POST['price']);
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
          <a class="nav-link" href="#">ajouter annonce</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../settings/">settings</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right">
         <li class="nav-item">
          <a class="nav-link" href="logout/">deconnection('.$_SESSION['fname'].' '.$_SESSION['lname'].')</a>
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
	              <input type="text" class="form-control" name="from" placeholder="de"><br>
	              <input type="text" class="form-control" name="to" placeholder="a"><br>
	              <input type="text" class="form-control" name="date" placeholder="date jj/mm/aaaa hh:mm"><br>
	              <input type="text" class="form-control" name="places" placeholder="places"><br>
	              <input type="text" class="form-control" name="price" placeholder="prix"><br>
	              <button type="submit" class="tn btn-primary">ajouter annonce</button>
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