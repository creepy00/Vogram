<div class="grid_8 right-column">
  <div class="article-title">
    <h3>AKCIJE</h3>
  </div>
  <div class="clear separator"></div>
  <div class="title"><h1><?php echo $akcija->name; ?></h1></div>
  <div class="navbar-holder right" style="">
    <ul class="navbar">
      <li class="nav-item selected"><a class="nav_link" href="<?php echo site_url('projekti/akcije/view/'.$akcija->id); ?>">O akciji</a></li>
      <li class="nav-item"><a class="nav_link" href="<?php echo site_url('projekti/akcije/video/'.$akcija->id); ?>">Video</a></li>
      <li class="nav-item"><a class="nav_link" href="<?php echo site_url('projekti/akcije/galerija/'.$akcija->id); ?>">Galerija</a></li>
      <li class="nav-item"><a class="nav_link" href="<?php echo site_url('projekti/akcije/linkovi/'.$akcija->id); ?>">Novinski članci</a></li>
    </ul>
  </div>
  <div class="shadow">
    <div class="inner-shadow">
      <div class="content-holder">
        <div class="article-stubs">
          <div class="article-stub">
            <?php echo $akcija->text; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>