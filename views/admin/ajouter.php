
 <div class="container admin info">
   <?php if (isset($_SESSION['insert'])) : ?>
   <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
       <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
       <strong>Success! </strong><?=$_SESSION['insert'] ?>
   </div>
 <?php endif; ?>

 <?php if (isset($_SESSION['insert_error']))  : ?>
   <div class="alert alert-danger fade in alert-dismissible" style="margin-top:18px;">
       <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
       <strong>Erreur! </strong> <?=$_SESSION['insert_error'] ?>
   </div>
 <?php endif; ?>
     <h1><strong>Ajouter un item </strong></h1>
    <form class="form-horizontal" action="<?=BASE_URL?>admin/insert" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="col-sm-12">
          <label for="Name" >Nom:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nom:">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <label for="Description" >Description:</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Description:">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <label for="Prix" >Prix:</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="prix:">
        </div>
      </div>

      <div class="form-group">
          <div class="col-sm-12">
            <label for="category">Categorie:</label>
            <select class="form-control" id="category" name="category">
              <?php while ($cat = $categories->fetch_object()) : ?>
                <option value="<?=$cat->id ?>"><?=$cat->name?></option>
              <?php endwhile; ?>
            </select>
          </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
        <label>Selectionner une image:</label>
        <input type="file" name="image">
        </div>
      </div>

       <button type="submit" name="submit" class="btn btn-success"><span class='glyphicon glyphicon-pencil'></span> Ajouter</button>
       <a href="<?=BASE_URL?>admin/index" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

    </form><!--fin form-->

  </div><!--fin container2-->
