<?php
require_once('database.class.php');
class annonce extends database
{
  private $id,$user_id,$from,$to,$date,$places,$price;
  function __construct()
  {
    parent::__construct();
  }
  function addAnnonce($user_id,$from,$to,$date,$places,$price){
    $query = "insert into annonce(user_id,fromd,tod,date,places,price) values(?,?,?,?,?,?)";
    $res = $this->dbc->prepare($query);
    return $res->execute(array($user_id,$from,$to,$date,$places,$price));
  }
  function deleteAnnonce($id){
    $query = "delete from annonce where id = ?";
    $res = $this->dbc->prepare($query);
    return $res->execute(array($id));
  }
  function updateAnnonce($id,$from,$to,$date,$places,$price){
    $query = "update annonce set fromd=?,tod=?,date=?,places=?,price=? where id = ?";
    $res = $this->dbc->prepare($query);
    return $res->execute(array($from,$to,$date,$places,$price,$id));
  }
  function getAllAnnonces(){
    $query = "select * from annonce order by id DESC";
    $res = $this->dbc->prepare($query);
    $res->execute();
    return $res->fetchAll();
  }
  function getAnnoncesUser($id){
    $query = "select * from annonce where user_id = ? order by id DESC";
    $res = $this->dbc->prepare($query);
    $res->execute(array($id));
    return $res->fetchAll();
  }

  function getAnnoncesDetailes($id){
    $query = "select * from annonce where id = ?";
    $res = $this->dbc->prepare($query);
    $res->execute(array($id));
    return $res->fetchAll()[0];
  }
}

?>
