<?php
require_once 'models/categories.php';
require_once 'models/items.php';

class adminController
{
  public function index(){
    $items = new Items();

    $items = $items->getAll();

    require_once 'views/admin/index.php';

    Utils::deleteSession('delete');
    Utils::deleteSession('delete_error');
  }

  public function voir(){
    if (isset($_GET['id'])) {
      $id = isset($_GET['id']) ? $_GET['id'] : false;
      if ($id) {
        $item = new Items();
        $item->setId($_GET['id']);
        $item = $item->getItemsById();
        if ($item) {
          require_once 'views/admin/voir.php';
        }
        else {
          //item is null
          header("location:".BASE_URL."admin/index");
        }

      }
      else {
        //$id is null
        header("location:".BASE_URL."admin/index");
      }
    }
    else {
      //$_GET['id'] is null
      header("location:".BASE_URL."admin/index");
    }
  }//fin function voir

  public function modifier(){
    if (isset($_GET['id'])) {
      $id = isset($_GET['id']) ? $_GET['id'] : false;
      if ($id) {
        $item = new Items();
        $item->setId($_GET['id']);
        $item = $item->getItemsById();
        if ($item) {
          //render page
          require_once 'views/admin/modifier.php';
          Utils::deleteSession('update');
          Utils::deleteSession('update_error');
          Utils::deleteSession('update_image_error');

        }
        else {
          //item is null
          //render index page
          header("location:".BASE_URL."admin/index");
        }

      }
      else {
        //$id is null
        //render index page
        header("location:".BASE_URL."admin/index");
      }
    }
    else {
      //$_GET['id'] is null
      //create error message with a session
      header("location:".BASE_URL."admin/index");
    }

  }

  //modifier un item
  public function update(){

    if (isset($_POST)) {
    $id = isset($_POST['id']) ? $_POST['id']:  false;
    $name = isset($_POST['name']) ? $_POST['name']:  false;
    $description = isset($_POST['description']) ? $_POST['description']:  false;
    $price = isset($_POST['price']) ? $_POST['price']:  false;
    $category = isset($_POST['category']) ? $_POST['category']:  false;
    $image = isset($_POST['image']) ? $_POST['image']:  false;

    //assign values to object items
    $item = new Items();
    $item->setId($id);
    $item->setName($name);
    $item->setDescription($description);
    $item->setPrice($price);
    $item->setCategory($category);
    $item->setImage($image);


    //save image to database || server
    if (isset($_FILES['fileImage'])) {

      $fileImage = $_FILES['fileImage'];

      $saveImage = Utils::saveImage($fileImage);

      if (!$saveImage) {
        $_SESSION['update_image_error'] = "Erreur: sAucun image sauvegardé .";
      }
    }

    //update item
    $update = $item->updateItem();

    if ($update) {
      //message update...return to update page
      $_SESSION['update'] = "Modification Item avec success";
    }
    else {
      //message error update avec un error session
      $_SESSION['update_error'] = "Erreur: Impossible de modifier l'Item";
    }

  } //fin if

    else {
        $_SESSION['update_error'] = "Erreur: Impossible de modifier l'Item";
    }
    header("location:".BASE_URL."admin/modifier&id=".$id);

  }

  public function suprimmer(){
    if (isset($_GET['id'])) {
      $id = isset($_GET['id']) ? $_GET['id'] : false;
      if ($id) {
        $item = new Items();
        $item->setId($_GET['id']);
        $delete = $item->deleteItemsById();
        if ($delete) {
          //success delete
          //create confirmation message with a session
          $_SESSION['delete'] = "Item supprimé avec succès !";
        }
        else {
          //item is null
          //create error message with a session
          $_SESSION['delete_error'] = "Erreur: aucun item supprimé !";

        }

      }
      else {
        //$id is null
        $_SESSION['delete_error'] = "Erreur: aucun item supprimé !";

      }
    }
    else {
      //$_GET['id'] is null
        $_SESSION['delete_error'] = "Erreur: aucun item supprimé !";

    }
    header("location:".BASE_URL."admin/index");

  } //fin function suprimmer

  public function ajouter(){
    $categories = new Categories();

    $categories = $categories->getAll();

    require_once 'views/admin/ajouter.php';

    Utils::deleteSession('insert');
    Utils::deleteSession('insert_error');
  }//fin class ajouter

  public function insert(){
    //delete session...

    if (isset($_POST)) {
    $id = isset($_POST['id']) ? $_POST['id']:  false;
    $name = isset($_POST['name']) ? $_POST['name']:  false;
    $description = isset($_POST['description']) ? $_POST['description']:  false;
    $price = isset($_POST['price']) ? $_POST['price']:  false;
    $category = isset($_POST['category']) ? $_POST['category']:  false;

    //assign values to object items
    $item = new Items();
    $item->setName($name);
    $item->setDescription($description);
    $item->setPrice($price);
    $item->setCategory($category);

    //save image to database || server
    if (isset($_FILES['image'])) {

      $fileImage = $_FILES['image'];

      $item->setImage($fileImage['name']);

      $saveImage = Utils::saveImage($fileImage);

    }

    //insert item
    $update = $item->insert();

    if ($update && $saveImage) {

      $_SESSION['insert'] = "Ajout Item avec success";
    }
    else {

      $_SESSION['insert_error'] = "Erreur: Impossible d'ajouter l'Item";
    }

    }
    else {
      //message error insert , no post
      $_SESSION['insert_error'] = "Erreur: Impossible d'ajouter l'Item";
    }
    header("location:".BASE_URL."admin/ajouter");
  }//fin function insert
}


 ?>
