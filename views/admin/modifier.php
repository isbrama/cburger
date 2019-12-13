
  <div class="container admin info">
    <?php if (isset($_SESSION['update'])) : ?>
    <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
        <strong>Success! </strong><?=$_SESSION['update'] ?>
    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION['update_error']))  : ?>
    <div class="alert alert-danger fade in alert-dismissible" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
        <strong>Erreur! </strong> <?=$_SESSION['update_error'] ?>
    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION['update_error']))  : ?>
    <div class="alert alert-danger fade in alert-dismissible" style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
        <strong>Erreur! </strong> <?=$_SESSION['update_image_error'] ?>
    </div>
  <?php endif; ?>
    <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="viewItem">
      <h1><strong>Modifier un item </strong></h1>
      <form class="form-horizontal" action="<?=BASE_URL?>admin/update" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?=$id?>" hidden>
        <div class="form-group">
          <div class="col-sm-12">
            <label for="Name" >Nom:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$item->name?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label for="Description" >Description:</label>
            <input type="text" class="form-control" id="description" name="description"  value="<?=$item->description?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <label for="Prix" >Prix:</label>
            <input type="text" class="form-control" id="price" name="price"  value="<?=$item->price?>">
          </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
              <label for="category">Categorie:</label>
              <select class="form-control" id="category" name="category">
                <option <?php if ($item->category== 1 ) echo 'selected' ; ?> value="1">Menus</option>
                <option <?php if ($item->category== 2 ) echo 'selected' ; ?> value="2">Burgers</option>
                <option <?php if ($item->category== 3 ) echo 'selected' ; ?> value="3">Snacks</option>
                <option <?php if ($item->category== 4 ) echo 'selected' ; ?> value="4">Salades</option>
                <option <?php if ($item->category== 5 ) echo 'selected' ; ?> value="5">Boissons</option>
                <option <?php if ($item->category== 6 ) echo 'selected' ; ?> value="6">Desserts</option>

              </select>
            </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <label for="image" >Image: <?=$item->image?></label>
            <input type="text" class="form-control imageToUpdate" id="image" name="image"  value="<?=$item->image?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
          <label>Selectionner une nouvelle image:</label>
          <input type="file" name="fileImage" class="fileImage">
          </div>
        </div>

         <button type="submit" name="submit" class="btn btn-success"><span class='glyphicon glyphicon-pencil'></span> Modifier</button>
         <a href="<?=BASE_URL?>admin/index" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

      </form><!--fin form-->
    </div><!--calss viewItem-->
    </div>

    <div class="col-sm-6 col-md-6 site">
      <div class="thumbnail">
      <img src="<?=BASE_URL?>images/<?=$item->image?>">
        <div class="price"><?=$item->price?>$</div>
          <div class="caption">
            <h4><?=$item->name?></h4>
            <p><?=$item->description?></p>
            <a class="btn btn-order" role="button" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
          </div>
        </div>
    </div>

  </div> <!--fin row -->

  </div><!--fin container2-->
