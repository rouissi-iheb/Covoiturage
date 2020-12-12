<?php
session_start();
require_once('../config/user.class.php');
require_once('../config/annonce.class.php');
require_once('../config/session.php');
if(check_session()){
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
          <a class="nav-link" href="AddAnnonce/">ajouter annonce</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="settings/">settings</a>
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
  ';
  $a = new annonce();
	if(isset($_GET['update'])){
    $id_annonce = $_GET['id'];
    $det = $a->getAnnoncesDetailes($_GET['id']);
    if (isset($_POST['from'])) {
      $a->updateAnnonce($_GET['id'],$_POST['from'],$_POST['to'],$_POST['date'],$_POST['places'],$_POST['price']);
      header('location:../myaccount/');
    }else{
      $det = $a->getAnnoncesDetailes($_GET['id']);
      echo '
      <div class="row" style="padding-top:80px;">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
        <form method="POST">
              <input type="text" class="form-control" name="from" placeholder="de" value="'.$det['fromd'].'"><br>
              <input type="text" class="form-control" name="to" placeholder="a" value="'.$det['tod'].'"><br>
              <input type="text" class="form-control" name="date" placeholder="date jj/mm/aaaa hh:mm" value="'.$det['date'].'"><br>
              <input type="text" class="form-control" name="places" placeholder="places" value="'.$det['places'].'"><br>
              <input type="text" class="form-control" name="price" placeholder="prix" value="'.$det['price'].'"><br>
              <button type="submit" class="tn btn-primary">modifier annonce</button>
            </form>
        </div>
        <div class="col-sm-3">
        </div>
      </div>  
      ';
  }
  }elseif(isset($_GET['delete'])){
    $id_annonce = $_GET['id'];
    $a->deleteAnnonce($_GET['id']);
    header('location:../myaccount/');
  }else{
echo '
      <div class="row" style="padding-top: 38px;">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID annonce</th>
      <th scope="col">de</th>
      <th scope="col">a</th>
      <th scope="col">date</th>
      <th scope="col">places</th>
      <th scope="col">prix</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>';
  foreach($a->getAnnoncesUser($_SESSION['id']) as $row) {
    echo '
      <tr>
        <th scope="row">'.$row['id'].'</th>
        <td>'.$row['fromd'].'</td>
        <td>'.$row['tod'].'</td>
        <td>'.$row['date'].'</td>
        <td>'.$row['places'].'</td>
        <td>'.$row['price'].'</td>
        <td>
          <a href="?update&id='.$row['id'].'" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">modifier</a>
          <a href="?delete&id='.$row['id'].'" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">supprimer</a>
        </td>
      </tr>
      ';
  }
    
    echo '
  </tbody>
</table>
';
  //fin du code page myaccount :
  }
  echo '
        </div>
      </div>
  </body>
  </html>
  ';  
}else{
  header('location:../login/');
}

?>
