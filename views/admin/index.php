
<div class="container admin ">
  <?php if (isset($_SESSION['delete'])) : ?>
  <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
      <strong>Success! </strong><?=$_SESSION['delete'] ?>
  </div>
<?php elseif (isset($_SESSION['delete_error']))  : ?>
  <div class="alert alert-danger fade in alert-dismissible" style="margin-top:18px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
      <strong>Erreur! </strong> <?=$_SESSION['delete_error'] ?>
  </div>
<?php endif; ?>
  <div class="row ">
    <h1><strong>Liste des items </strong><a href="<?=BASE_URL?>admin/ajouter" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
    <table class="table table-striped table-bordered">
      <thead>
        <tr >
          <th>Nom</th>
          <th>Description</th>
          <th>Prix</th>
          <th>Categorie</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php if ($items->num_rows>0) : ?>
            <?php while($item = $items->fetch_object()) : ?>
              <td><?= $item->name ?></td>
              <td><?= $item->description ?></td>
              <td><?= $item->price ?></td>
              <td><?= $item->category ?></td>
              <td>
                <a class='btn btn-default' href='<?=BASE_URL?>admin/voir&id=<?=$item->id?>'><span class='glyphicon glyphicon-eye-open'></span> Voir </a>
                <a class='btn btn-primary'  href='<?=BASE_URL?>admin/modifier&id=<?=$item->id?>'><span class='glyphicon glyphicon-pencil'></span> Modifier </a>
                <a class='btn btn-danger'   href='<?=BASE_URL?>admin/suprimmer&id=<?=$item->id?>'><span class='glyphicon glyphicon-remove'></span> Supprimer </a>
              </td>
            </tr>
      <?php endwhile; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
  <a href="<?=BASE_URL?>" class="btn btn-light btn-home "><span class="glyphicon glyphicon-arrow-left"></span></a></h1>
</div>
