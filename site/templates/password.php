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

  <?php if(isset($failed)): ?>
  <div class="alert error">
  	<p><?= $failed ?></p>
  </div>
  <?php endif ?>

	<form method="POST">

		<div class="field">
			<label for="password">New password <abbr title="required">*</abbr></label>
			<input type="password" id="password" name="password">
		</div>

    <div class="submit">
      <button type="submit" name="update" value="update">Update</button>
      <a href="<?= url('account') ?>">Back to account</a>
    </div>

	</form>

	<?php endif ?>

</main>

<?php snippet('footer') ?>