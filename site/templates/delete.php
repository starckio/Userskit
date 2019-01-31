<?php snippet('header') ?>

<main class="main" role="main">

  <h1 class="center"><?= $page->title() ?></h1>

	<?php if(isset($success)): ?>
	<div class="alert success">
		<p><?= $success ?></p>
	</div>
	<?php else: ?>

	<?php if($error): ?>
	<div class="alert error">
		<?php foreach($error as $message): ?>
		<p><?= html($message) ?></p>
		<?php endforeach ?>
	</div>
	<?php endif ?>

  <form method="POST">

		<div class="field">
			<label for="password">Password <abbr title="required">*</abbr></label>
			<input type="password" id="password" name="password">
		</div>

    <div class="field checkbox">
			<input id="deleteConfirm" type="checkbox" name="deleteConfirm" required>
			<label for="deleteConfirm">Delete confirm</label>
		</div>

    <div class="submit">
      <button type="submit" name="delete" value="delete">Delete</button>
      <a href="<?= url('account') ?>">Cancel</a>
    </div>

	</form>

  <?php endif ?>

</main>

<?php snippet('footer') ?>