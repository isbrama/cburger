<?php
require_once 'models/categories.php';
require_once 'models/items.php';

class principalController
{
  public function index(){
    $categories = new Categories();

    $categories = $categories->getAll();
    
    require_once 'views/principal/index.php';
  }
}
 ?>
