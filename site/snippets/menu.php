<nav role="navigation">
	<ul class="menu cf">
		<?php foreach($pages->visible() as $p): ?>
		<li><a<?php e($p->isOpen(), ' class="active"') ?> href="<?= $p->url() ?>"><?= $p->title()->h() ?></a></li>
		<?php endforeach ?>

		<?php if($user = $kirby->user()): ?>

		<?php if($user->isAdmin()): ?>
		<li><a href="<?= url('panel') ?>">Panel</a></li>
		<?php endif ?>

		<li><a<?php e($pages->find('account')->isOpen(), ' class="active"') ?>  href="<?= url('account') ?>">Account</a></li>
		<li><a href="<?= url('logout') ?>">Logout</a></li>

		<?php else: ?>

		<li><a<?php e($pages->find('login')->isOpen(), ' class="active"') ?>  href="<?= url('login') ?>">Login</a></li>
		<li><a<?php e($pages->find('account/register')->isOpen(), ' class="active"') ?>  href="<?= url('account/register') ?>">Register</a></li>
    <li><a<?php e($pages->find('account/mailregister')->isOpen(), ' class="active"') ?>  href="<?= url('account/mailregister') ?>">Register by email</a></li>

		<?php endif ?>
	</ul>
</nav>
