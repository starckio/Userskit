<?php snippet('header') ?>

<main class="main" role="main">

	<?php if(isset($success)): ?>
  <h1 class="center">🎉 Successfully updated 🎉</h1>
  <div class="alert success">
    <p><?= $success ?></p>
  </div>
  <?php else: ?>

  <h1 class="center"><?= $page->title() ?></h1>

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
			<label for="name">Full name <abbr title="required">*</abbr></label>
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
      <div class="olink"><a href="<?= url('account/password') ?>">Change password</a></div>
    </div>

		<?php if(!$user->isAdmin()): ?>
    <div class="center">
      <a href="<?= url('account/delete') ?>">Delete your account ?</a>	
    </div>
    <?php endif ?>

	</form>
  <p class="center">Required fields <abbr title="required">*</abbr></p>

</main>

<?php snippet('footer') ?>