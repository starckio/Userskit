<?php snippet('header') ?>

<main class="main" role="main">

	<?php if(isset($success)): ?>
  <h1 class="center">🎉 Successfully updated 🎉</h1>
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

  <?php if(isset($failed)): ?>
  <div class="alert error">
  	<p><?= $failed ?></p>
  </div>
  <?php endif ?>

	<form method="POST">

		<div class="field">
			<label for="password">New password <abbr title="required">*</abbr></label>
			<input type="password" id="password" name="password" required>
		</div>

    <div class="field">
    	<label for="validatepassword">Retype your password <abbr title="required">*</abbr></label>
    	<input type="password" id="validatepassword" name="validatepassword" required>
    </div>

    <div class="submit">
      <button type="submit" name="update" value="update">Update</button>
      <div class="olink"><a href="<?= url('account') ?>">Back to account</a></div>
    </div>

	</form>
  <p class="center">Required fields <abbr title="required">*</abbr></p>

	<?php endif ?>

</main>

<?php snippet('footer') ?>