<?php snippet('header') ?>

<main class="main" role="main">

	<?php if(isset($success)): ?>
	<h1 class="center">🎉 Account deleted successfully 🎉</h1>
  <div class="alert success">
    <p><?= $success ?></p>
  </div>
  <?php else: ?>

  <h1 class="center"><?= $page->title() ?></h1>

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
			<input type="password" id="password" name="password" required>
		</div>

    <div class="field checkbox">
			<input id="deleteConfirm" type="checkbox" name="deleteConfirm" required>
			<label for="deleteConfirm">Delete confirm</label>
		</div>

    <div class="submit">
      <button type="submit" name="delete" value="delete">Delete</button>
      <div class="olink"><a href="<?= url('account') ?>">Back to account</a></div>
    </div>

	</form>
	<p class="center">Required fields <abbr title="required">*</abbr></p>

  <?php endif ?>

</main>

<?php snippet('footer') ?>