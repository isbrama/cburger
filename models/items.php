<?php

class Items
{
  private $id;
  private $name;
  private $description;
  private $price;
  private $image;
  private $category;
  private $db;

  function __construct()
  {
    $this->db = Database::connect();
  }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getItemsByCategory($category){
      $sql = "SELECT * FROM items WHERE category = $category;";

      return $this->db->query($sql);
    }

    public function getItemsById(){
      $sql = "SELECT * FROM items WHERE id = {$this->getId()};";

      $item =  $this->db->query($sql);

      $item = $item->fetch_object();

      return $item;
    }

    public function getAll(){
      $sql = "SELECT * FROM items ORDER BY category ASC;";

      return $this->db->query($sql);
    }

    public function deleteItemsById(){
       $sql = "DELETE FROM items WHERE id={$this->getId()}";

       return  $this->db->query($sql);
    }

    public function updateItem(){
      $sql ="UPDATE items SET name='{$this->getName()}', ";
      $sql.="description='{$this->getDescription()}', ";
      $sql.="price='{$this->getPrice()}', ";
      $sql.="category='{$this->getCategory()}', ";
      $sql.="image='{$this->getImage()}'";
      $sql.="WHERE id='{$this->getId()}'";

      return $this->db->query($sql);

    }//fin function updateItem

    public function insert(){
      $sql= "INSERT INTO items (name, description, price, category, image) VALUES ('{$this->getName()}', '{$this->getDescription()}','{$this->getPrice()}', '{$this->getCategory()}', '{$this->getImage()}')";

      return $this->db->query($sql);
    }//fin function insert

}
 ?>
