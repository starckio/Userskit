<?php if(!$kirby->user()) go('account') ?>
<?php snippet('header') ?>

<main class="main" role="main">

	<div class="text">
		<h1><?= $page->title() ?> <?= $kirby->user()->name() ?></h1>
    <?= $page->text()->kt() ?>
	</div>

</main>

<?php snippet('footer') ?>