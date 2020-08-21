<?php
require_once 'init.php';

$stmt = $pdo->prepare('SELECT * FROM images WHERE ?');
$stmt->execute(array(1));
$images = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="http://cdns.localhost/libraries/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdns.localhost/libraries/photoswipe/4.1.3/photoswipe.css">

  <!-- Skin CSS file (styling of UI - buttons, caption, etc.)
     In the folder of skin CSS file there are also:
     - .png and .svg icons sprite,
     - preloader.gif (for browsers that do not support CSS animations) -->
  <link rel="stylesheet" href="http://cdns.localhost/libraries/photoswipe/4.1.3/default-skin/default-skin.css">


  <link rel="stylesheet" href="librarie.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <a href="admin.php">Admin</a>
    <!--
    <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php foreach ($images as $key => $img): ?>
            <div class="swiper-slide">
              <img style="width: 100%;height: 100%" src="<?= $img['path'] ?>" alt="image">
            </div>
          <?php endforeach; ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>


        <div class="swiper-scrollbar"></div>

    </div>
    -->


<div class="row my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
  <?php foreach ($images as $key => $img): ?>
  	<figure class="col-md-3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
  		<a href="http://gallery.localhost/<?= $img['path'] ?>" itemprop="contentUrl" data-size="600x400">
  		    <img class="img-fluid" src="http://gallery.localhost/<?= $img['path'] ?>" itemprop="thumbnail" alt="Image description" />
  		</a>
  		<figcaption itemprop="caption description"><?= $img['name'] ?></figcaption>
  	</figure>
  <?php endforeach; ?>
	<!-- <figure class="col-md-3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
		<a href="http://gallery.localhost/images/Eintopf-1920x1080.jpg" itemprop="contentUrl" data-size="600x400">
		    <img class="img-fluid" src="http://gallery.localhost/images/Eintopf-1920x1080.jpg" itemprop="thumbnail" alt="Image description" />
		</a>
		<figcaption itemprop="caption description">Image caption</figcaption>
	</figure> -->


</div>


<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

   <!-- Background of PhotoSwipe.
	 It's a separate element as animating opacity is faster than rgba(). -->
  <div class="pswp__bg"></div>

 <!-- Slides wrapper with overflow:hidden. -->
  <div class="pswp__scroll-wrap">

	<!-- Container that holds slides.
		PhotoSwipe keeps only 3 of them in the DOM to save memory.
		Don't modify these 3 pswp__item elements, data is added later on. -->
	<div class="pswp__container">
		<div class="pswp__item"></div>
		<div class="pswp__item"></div>
		<div class="pswp__item"></div>
	</div>

	<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
	<div class="pswp__ui pswp__ui--hidden">

		<div class="pswp__top-bar">

			<!--  Controls are self-explanatory. Order can be changed. -->

			<div class="pswp__counter"></div>

			<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

			<button class="pswp__button pswp__button--share" title="Share"></button>

			<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

			<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

			<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
			<!-- element will get class pswp__preloader--active when preloader is running -->
			<div class="pswp__preloader">
				<div class="pswp__preloader__icn">
				  <div class="pswp__preloader__cut">
				    <div class="pswp__preloader__donut"></div>
				  </div>
				</div>
			</div>
		</div>

        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	        <div class="pswp__share-tooltip"></div>
        </div>

		<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
		</button>

		<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
		</button>

		<div class="pswp__caption">
			<div class="pswp__caption__center"></div>
		</div>

    </div>

	</div>

</div>


</div>

  <!-- <script src="http://cdns.localhost/libraries/swiperjs/5.4.2/js/swiper.min.js" charset="utf-8"></script> -->

  <!-- Core JS file -->
  <script src="http://cdns.localhost/libraries/photoswipe/4.1.3/photoswipe.min.js"></script>
  <!-- UI JS file -->
  <script src="http://cdns.localhost/libraries/photoswipe/4.1.3/photoswipe-ui-default.min.js"></script>
  <script src="http://cdns.localhost/libraries/jquery/3.5.0/jquery.min.js" charset="utf-8"></script>
  <script src="http://cdns.localhost/libraries/bootstrap/4.5.0/js/bootstrap.min.js" charset="utf-8"></script>
  <script src="gallerie.js" charset="utf-8"></script>
</body>
</html>
