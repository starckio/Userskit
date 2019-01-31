<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
	<meta name="description" content="<?= $site->description()->html() ?>">
	<meta name="keywords" content="<?= $site->keywords()->html() ?>">

  <!--  Replace `no-js` class in root element with `js` -->
  <script>(function(cl){cl.remove('no-js');cl.add('js');})(document.documentElement.classList);</script>

	<?= css('assets/css/main.css') ?>

</head>
<body>

<header class="header cf" role="banner">
  <?php snippet('logo') ?>
	<?php snippet('menu') ?>
</header>