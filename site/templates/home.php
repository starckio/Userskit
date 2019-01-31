<?php snippet('header') ?>

<main class="main" role="main">

	<div class="text">
		<h1 class="center"><?= $page->title() ?><?php if($user = $kirby->user()): ?> <?= $user->name() ?><?php endif ?></h1>

    <?php if($user = $kirby->user() and $user->role('editor')): ?>
    <p style="text-align:center;">This part of the page is only visible for users with the role Editor.</p>
    <img src="<?= $kirby->url('assets') ?>/images/home.jpg" alt="" />
    <?php else: ?>
    <?= $page->text()->kt() ?>
    <?php endif ?>
	</div>

</main>

<?php snippet('footer') ?>