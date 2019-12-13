<?php
class Categories
{
  private $id;
  private $name;
  private $db;

  function __construct()
  {
    $this->db = Database::connect();
  }

  public function getId(){
      return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function getAll(){

    $sql="SELECT * FROM categories;";

    return $this->db->query($sql);

  }

}

 ?>
