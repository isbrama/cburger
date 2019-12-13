<div class="container site">
  <nav>
    <ul class="nav nav-pills nav-justified">
      <?php if($categories->num_rows>0): ?>
      <?php $catNumRows =  $categories->num_rows?>
      <?php while ($cat = $categories->fetch_object()) : ?>
      <?php if($cat->id==1) : ?>
      <li role='presentation' class='active'><a href='#<?=$cat->id?>' data-toggle='pill'><?=$cat->name?></a></li>
      <?php else: ?>
      <li role='presentation'><a href='#<?=$cat->id?>' data-toggle='pill'><?=$cat->name?></a></li>
      <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
    </ul>
  </nav>
  <div class='tab-content'>
    <?php for ($i=1; $i <= $catNumRows; $i++) : ?>
    <?php if ($i == 1) :  ?>
    <div class='tab-pane active' id='<?=$i?>'>
      <?php else: ?>
      <div class='tab-pane' id='<?=$i?>'>
        <?php endif; ?>
        <div class='row'>
          <?php
            $items = new Items();
            $items = $items->getItemsByCategory($i);
           ?>
          <?php if ($items->num_rows>0) : ?>
          <?php while ($item = $items->fetch_object()):  ?>
          <div class='col-sm-6 col-md-4'>
            <div class="thumbnail">
              <img src='<?=BASE_URL?>images/<?=$item->image?>'>
              <div class='price'><?=$item->price?>$</div>
              <div class='caption'>
              <h4><?=$item->name?></h4>
              <p><?=$item->description?></p>
              </div>
                <a class='btn btn-order' role='button' href='#'><span class='glyphicon glyphicon-shopping-cart'></span> Commander</a>
            </div>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
        </div>
        <!--fin row-->
      </div>
      <!--fin tab-pane-->
      <?php endfor; ?>
    </div>
    <!--fin tab-content-->
  </div>
  <!--fin container-->
