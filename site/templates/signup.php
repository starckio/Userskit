<?php snippet('header') ?>

<main class="main" role="main">

  <h1 class="center"><?= $page->title() ?></h1>

	<?php if(isset($success)): ?>
	<div class="alert success">
		<p><?= $success ?></p>
	</div>
	<?php else: ?>

  <?php if(isset($error)): ?>
  <div class="alert error">
  	<p><?= $error ?></p>
  </div>
  <?php endif ?>

	<form method="POST">

		<div class="field">
			<label for="name">Full name <abbr title="required">•</abbr></label>
			<input type="text" id="name" name="name" value="<?= esc(get('name')) ?>" required>
		</div>

		<div class="field">
			<label for="email">Email <abbr title="required">•</abbr></label>
			<input type="email" id="email" name="email" value="<?= esc(get('email')) ?>" required>
		</div>

		<div class="field">
			<label for="password">Password <abbr title="required">•</abbr></label>
			<input type="password" id="password" name="password" required>
      <small class="help">Minimum 8 characters.</small>
		</div>

    <div class="field">
    	<label for="validate">Retype your password <abbr title="required">•</abbr></label>
    	<input type="password" id="validate" name="validate" required>
    </div>

		<div class="field honeypot">
			<label for="website">Web site</label>
			<input type="text" id="website" name="website">
		</div>
    
    <div class="submit">
      <button type="submit" name="registration" value="registration">Create Account</button>
      <p><abbr title="required">•</abbr> Required fields.</p>
    </div>

  </form>

  <div class="otherlink">You are a member? <a href="<?= url('login') ?>">Sign in</a></div>

	<?php endif ?>

</main>

<?php snippet('footer') ?>