<?php if(!$kirby->user()) go('login') ?>
<?php snippet('header') ?>

<main class="main" role="main">

	<div class="text">
		<h1><?= $page->title() ?><?php if($user = $kirby->user()): ?> <?= $user->name() ?><?php endif ?></h1>
    <?= $page->text()->kt() ?>
	</div>

</main>

<?php snippet('footer') ?>