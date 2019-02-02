<?php snippet('header') ?>

<main class="main" role="main">

	<?php if(isset($success)): ?>
  <h1 class="center">🎉 Successfully updated 🎉</h1>
  <div class="alert success">
    <p><?= $success ?></p>
  </div>
  <?php else: ?>

  <h1 class="center"><?= $page->title() ?></h1>

  <?php if(isset($error)): ?>
  <div class="alert error">
  	<p><?= $error ?></p>
  </div>
  <?php endif ?>

	<form method="POST">

		<div class="field">
			<label for="password">New password <abbr title="required">•</abbr></label>
			<input type="password" id="password" name="password" required>
		</div>

    <div class="field">
    	<label for="validate">Retype your password <abbr title="required">•</abbr></label>
    	<input type="password" id="validate" name="validate" required>
    </div>

    <div class="submit">
      <button type="submit" name="update" value="update">Change password</button>
      <p><abbr title="required">•</abbr> Required fields.</p>
    </div>

  </form>

  <div class="otherlink"><a href="<?= url('account') ?>">Back to account</a></div>

	<?php endif ?>

</main>

<?php snippet('footer') ?>