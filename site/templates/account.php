<?php snippet('header') ?>

<main class="main" role="main">

  <h1 class="center"><?= $page->title() ?></h1>

	<?php if(isset($success)): ?>
	<div class="alert success">
		<p><?= $success ?></p>
	</div>
	<?php endif ?>

	<?php if($error): ?>
	<div class="alert error">
		<?php foreach($error as $message): ?>
		<p><?= html($message) ?></p>
		<?php endforeach ?>
	</div>
	<?php endif ?>

	<form method="POST">

		<div class="field">
			<label for="name">Name <abbr title="required">*</abbr></label>
			<input type="text" id="name" name="name" value="<?= $user->name() ?>">
      <small class="help">Currently: <strong><?= $user->name() ?></strong></small>
		</div>

    <div class="field">
			<label for="email">Email <abbr title="required">*</abbr></label>
			<input type="text" id="email" name="email" value="<?= $user->email() ?>">
      <small class="help">Currently: <strong><?= $user->email() ?></strong></small>
		</div>

    <div class="submit">
      <button type="submit" name="update" value="update">Update</button>
      <a href="<?= url('account/password') ?>">Change password</a>
    </div>

		<?php if(!$user->isAdmin()): ?>
    <div class="submit">
      <a href="<?= url('account/delete') ?>">Delete your account ?</a>	
    </div>
    <?php endif ?>

	</form>

</main>

<?php snippet('footer') ?>