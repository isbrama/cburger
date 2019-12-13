<div class="container admin info">
  <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="viewItem">
      <h1><strong>Item <?=$item->id ?> </strong></h1>
      <ul>
        <li>Nom: <?=$item->name ?></li>
        <li>Description: <?=$item->description ?></li>
        <li>Prix: <?=$item->price ?></li>
        <li>Categorie: <?=$item->category ?></li>
        <li>Image: <?=$item->image ?></li>
        <li>
          <a href="<?=BASE_URL?>admin/index" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
        </li>
      </ul>
      </div>
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

  </div>
</div>
