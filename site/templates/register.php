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
			<label for="name">Full name</label>
			<input type="text" id="name" name="name" value="<?= esc(get('name')) ?>">
		</div>

		<div class="field">
			<label for="email">Email <abbr title="required">*</abbr></label>
			<input type="email" id="email" name="email" value="<?= esc(get('email')) ?>" required>
		</div>

		<div class="field">
			<label for="password">Password <abbr title="required">*</abbr></label>
			<input type="password" id="password" name="password" required>
      <small class="help">Minimum 8 characters.</small>
		</div>

    <div class="field">
    	<label for="validatepassword">Retype your password <abbr title="required">*</abbr></label>
    	<input type="password" id="validatepassword" name="validatepassword" required>
    </div>

		<div class="field honeypot">
			<label for="subject">Honeypot</label>
			<input type="text" id="subject" name="subject">
		</div>
    
    <div class="submit">
      <button type="submit" name="register" value="register">Register</button>
      <div class="olink"><a href="<?= url('login') ?>">Login</a></div>
    </div>

	</form>
  <p class="center">Required fields <abbr title="required">*</abbr></p>

	<?php endif ?>

</main>

<?php snippet('footer') ?>