<?php snippet('header') ?>

<main class="main" role="main">

	<?php if(isset($success)): ?>
	<h1 class="center">🎉 Account deleted successfully 🎉</h1>
  <div class="alert success">
    <p><?= $success ?></p>
  </div>
  <?php else: ?>

  <h1 class="center"><?= $page->title() ?></h1>
  <p class="center">We’re sorry to see you go.</p>

	<?php if($error): ?>
	<div class="alert error">
		<p><?= $error ?></p>
	</div>
	<?php else: ?>
  <div class="alert info">
    <p>Account deletion is <strong>final</strong>.<br />There will be no way to restore your account.</p>
  </div>
  <?php endif ?>

  <form method="POST">

		<div class="field">
			<label for="password">Password <abbr title="required">•</abbr></label>
			<input type="password" id="password" name="password" required>
		</div>

    <div class="field">
    	<label for="validate">Retype your password <abbr title="required">•</abbr></label>
    	<input type="password" id="validate" name="validate" required>
    </div>

    <div class="field checkbox">
			<input id="deleteConfirm" type="checkbox" name="deleteConfirm" required>
			<label for="deleteConfirm">I am fully aware of what I am doing.</label>
		</div>

    <div class="submit">
      <button type="submit" name="delete" value="delete">Delete my account</button>
      <p><abbr title="required">•</abbr> Required fields.</p>
    </div>

  </form>

  <div class="otherlink"><a href="<?= url('account') ?>">Never mind, keep my account!</a></div>

  <?php endif ?>

</main>

<?php snippet('footer') ?>