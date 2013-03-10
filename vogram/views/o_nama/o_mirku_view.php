<!DOCTYPE html>
<html>
<head>
  <title>Vogram</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="<?php echo base_url('stylesheets/reset.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('stylesheets/stylesheet.css'); ?>" type="text/css" />
  <script type="text/javascript" src="<?php echo base_url('javascript/jquery.js'); ?>"></script>

  <!--[if lt IE 10]> <link rel="stylesheet" href="<?php echo base_url('stylesheets/addonIE8.css') ?>" type="text/css" /><![endif]-->
  <link rel="icon" type="image/png" href="<?php echo base_url('images/favicon.png') ?>" />
</head>
<body>
<div class="container holder">
  <div class="grid_12 site-holder">
    <div class="header">
      <div class="header-items">
        <a href="http://linkedin.com/in/vogram" target="_blank"><img src="<?php echo base_url('images/icon-linked.png') ?>" alt="" /></a>
        <a href="http://twitter.com/vogram" target="_blank"><img src="<?php echo base_url('images/icon-twitter.png') ?>" alt=""/></a>
        <a href="http://youtube.com/user/vogram" target="_blank"><img src="<?php echo base_url('images/icon-yt.png') ?>" alt="" /></a>
        <a href="http://facebook.com/vogram-serbia" target="_blank"><img src="<?php echo base_url('images/icon-fb.png') ?>" alt="" /></a>
        <form class="header-search" action="#">
          <div class="wrapper">
            <button class="search_button" type="submit"><img title="Search" src="<?php echo base_url('images/icon-magnify.png') ?>" alt="Find" /></button>
            <input type="text" placeholder="Pretraga sajta.." name="search" class="search_box">
          </div>
        </form>
        <a href="#"><img src="<?php echo base_url('images/icon-rs.png') ?>" alt="" /></a>
        <a href="#"><img src="<?php echo base_url('images/icon-en.png') ?>" alt="" /></a>
      </div>
    </div>
    <div class="logo-holder">
      <div class="logo">
        <img src="<?php echo base_url('images/logo.png') ?>" alt="Logo" />
      </div>
      <div class="logo-background"></div>
    </div>
    <div class="clear separator"></div>
    <div class="main-holder">
      <div class="grid_2 left-column">
        <div class="sidebar">
          <ul>
            <li><a href="<?php echo base_url(); ?>">Naslovna</a></li>

            <li class="main-menu" type="o-nama"><a href="#">O nama</a></li>
            <li class="sub-menu o-nama"><a href="<?php echo site_url('o_nama'); ?>">o nama</a></li>
            <li class="sub-menu o-nama"><a href="<?php echo site_url('o_nama/mirko'); ?>">o Mirku</a></li>
            <li class="sub-menu o-nama"><a href="<?php echo site_url('o_nama/press'); ?>">press</a></li>

            <li class="main-menu" type="projekti"><a href="<?php echo site_url('projekti'); ?>">Projekti</a></li>
            <li class="sub-menu projekti"><a href="<?php echo site_url('projekti/kultura'); ?>">kultura i umetnost</a></li>
            <li class="sub-menu projekti"><a href="<?php echo site_url('projekti/ekologija'); ?>">ekologija</a></li>
            <li class="sub-menu projekti"><a href="<?php echo site_url('projekti/edukacija'); ?>">edukacija i seminari</a></li>
            <li class="sub-menu projekti"><a href="<?php echo site_url('projekti/akcije'); ?>">akcije</a></li>

            <li class="main-menu" type="edukacija"><a href="#">Edukacija</a></li>
            <li class="sub-menu edukacija"><a href="#">radionice i seminari</a></li>
            <li class="sub-menu edukacija"><a href="#">edukativni materijali</a></li>

            <li class="main-menu" type="multimedija"><a href="#">Multimedija</a></li>
            <li class="sub-menu multimedija"><a href="#">video</a></li>
            <li class="sub-menu multimedija"><a href="#">audio</a></li>
            <li class="sub-menu multimedija"><a href="#">dizajn</a></li>
            <li class="sub-menu multimedija"><a href="#">murali</a></li>

            <li class="main-menu" type="online-shop"><a href="#">Online shop</a></li>
            <li class="sub-menu online-shop"><a href="#">dizajn i multimedia</a></li>
            <li class="sub-menu online-shop"><a href="#">Vogram moda</a></li>

            <li><a href="#">Partneri</a></li>
            <li><a href="../kontakti.html">Kontakti</a></li>
          </ul>
        </div>
      </div>
      <script type="text/javascript">
        $("li.main-menu").hover(
            function () {
              var type_name = $(this).attr('type');
              var child = $("li." + type_name+":first");
              if (child.is(":visible")) {

              } else {
                $("li.sub-menu").slideUp('medium');
                $("li."+type_name).slideDown('medium');
              }
            }
        );

      </script>
      <div id="o-mirku"></div>
      <div class="grid_8 right-column">
        <div class="article-title">
          <h3>O MIRKU</h3>
        </div>
        <div class="shadow">
          <div class="inner-shadow">
            <div class="content-holder">
              <div class="article-stubs">
                <div class="article-stub">
                  <h1>Mirko se rodio 2. novembra na Kamenjaru. Sada znamo da je neobičnom uzletu njegovog bića, pored neobičnosti kao takve,
                    doprinelo i uvažavanje nekonvencionalnog razvojnog puta kojim je Mirko izabrao da ide. Jasno je sada, dva meseca kasnije, ali tada...
                  </h1>
                  <div class="dots-line"></div>
                  <div class="left-article">
                    <p>
                      Znate, Mirko se rodio već zašiljen. Očigledan znak da ima nešto da kaže! Odmah smo je-dnoglasno odlučili da ćemo ga pomno slušati, jer takvi smo ljudi. Rešili smo – pustićemo ga da bude slobodan da misli i raste izvan ustanovljenog kalupa odrastanja, bez stega proseka, da se razvija brzinom komete jer neslućeni kapaciteti ponekad to zahtevaju. Srećom, na vreme smo razumeli da zarezan, Mirko neće zarezivati nikog ko pokuša da mu stane na put. iskustvom i u svetu priznatim rezultatima.
                      Rodio se spreman da beleži svet oko sebe. Naivno smo poverovali da će biti pisac. Nije mu trebalo mnogo da nas demantuje. Fakat je da mu ni za šta nije trebalo mnogo. I dok smo mi licitirali o čemu će pisati, Mirko je počeo da crta.
                    </p>
                  </div>
                  <div class="right-article">
                    <p>
                      On ucrtava svoju okolinu na jedan čudnovat način. Videćete, ponekad ume biti i krajnje apstraktan, ali uvek veoma precizan. Jednom je tako nacrtao oblačić. Mislili smo – dete k'o dete, crta nebo, ležeći stalno na leđima najčešće je gledao u oblake. Međutim, kada je za koju nedelju iznenada progovorio, objasnio nam je da je to personifikacija njegovog uma, neka vrsta prazne table – tako je rekao, koju će ispisivati čim dozna ko je i kakav je to svet u kom se nastanio. Bilo nam je jasno da je vrag odneo šalu, ali nije bilo vremena za čuđenje. Mirko je zahtevao, doduše prećutno, puno radno vreme, pažnju i posvećenost. Hitro smo se pribrali, podelili uloge u timu i prionuli na aktivno učestvovanje u njegovom sazrevanju. To je značilo dati mu u ruke ključeve od mnogih vrata, pogurati ona koja otključa i pustiti ga da istražuje. Nedugo zatim, jurcao je oko komšijskih kuća skupljajući lišće na gomile, cepajući drva i farbajući tarabe. Mi smo znali da je to unapređivanje lokalne zajednice, ali nismo gnjavili. Samo smo ga učili da čita i piše, dok je on savesno umnožavao oblačiće. Videli smo da se situacija zakuvava.
                      Ubrzo nas je okupio. „Porastao sam prilično. Umem da izrazim svoje želje i slobodan sam da ih ostvarujem. Želim to i za druge. Jednostavno je – želim VOGRAM.“ I zaista jeste bilo jednostavno – pokazao je inicijativu i dao joj ime, baš kao što smo mi dali njemu. Tada smo znali da je spreman. Tog dana D poverili smo mu da vodi zajedničku misiju. Sutradan, po svoj prilici decentralizovan, rodom s Kamenjara, Mirko je zatražio da ga vodimo u grad. Nismo časka časili, kupili smo mu patike i poslali ga putem socija-lizacije. Bio je to poslednji korak do VOGRAM-a. Odlazeći doviknuo je: „Još uvek samo uočavam probleme, ali uskoro ću ih rešavati. Ja sam angažovani građanin ovog društva“. Tako je rekao, doslovce. Mi se smrzli.
                      I eno ga, ispisuje svoje oblačaste table. Svrati samo na ručak i stalno započinje nove di-skusije. I dalje uglavnom postavlja pitanja, ali cilj je jasan – odgovoriti tačno i kreativno. Lako je moguće da ćete nabasati na njega u gradu. Ako ništa drugo, pohvalite mu patike!
                    </p>
                    <div class="gren-url-o-mirku">
                      <a class="green-url" href="#">Piši Mirku</a>
                      <a class="green-url" href="#">Usavrši Mirkov Karakter</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="footer-separator"></div>
      <p>2012 VOGRAM Srbija| Kreirano od strane VOGRAM tima</p>
    </div>
  </div>
</div>
</body>
</html>