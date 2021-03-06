<div class="grid_8 right-column">
  <div class="article-title">
    <h3>AKCIJE</h3>
  </div>
  <div class="shadow">
    <div class="inner-shadow">
      <div class="content-holder">
        <div class="article-stubs">
          <div class="article-stub">
            <h1>
              U akcije VOGRAM-a spadaju sve one aktivnosti koje nisu u okviru zvanično realizovanih projekata.
              Medju njima ćete naći informacije o humanitarnim akcijama i donacijama u koje udruženje ulaže svoju dobru volju, energiju i sredstva kako bi načinilo određene aspekte
              svakodnevnog života građana lepšim, kvalitetnijim i pozitivnijim.
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cards">
    <?php foreach($akcije as $key => $akcija) { ?>
      <div class="card <?php if ((($key + 1) % 3) === 0 ) echo 'first'; ?>">
        <div class="top-part"></div>
          <p><?php echo $akcija->sinopsis ?></p>
        <a href="<?php echo site_url('projekti/akcije/view/'.$akcija->id) ?>">saznaj više >></a>
      </div>
    <?php } ?>


  </div>
</div>
<div class="clear" style="height: 630px"></div>
