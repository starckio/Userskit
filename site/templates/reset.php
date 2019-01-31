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
	  <p><?= $error ?></p>
	</div>
	<?php endif ?>

	<form method="POST">

		<div class="field">
			<label for="email">Email <abbr title="required">*</abbr></label>
			<input type="email" id="email" name="email" value="<?= get('email') ?>">
		</div>

		<div class="field honeypot">
			<label for="subject">Honeypot</label>
			<input type="text" id="subject" name="subject">
		</div>
    
    <div class="submit">
      <button type="submit" name="reset" value="reset">Reset</button>
      <a href="<?= url('login') ?>">Login</a>
    </div>

	</form>

	<?php endif ?>

</main>

<?php snippet('footer') ?>