<?php snippet('header') ?>

<main class="main" role="main">

	<?php if(isset($success)): ?>
	<h1 class="center">🎉 Successful registration 🎉</h1>
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
			<label for="name">Full name <abbr title="required">•</abbr></label>
			<input type="text" id="name" name="name" value="<?= esc(get('name')) ?>" required>
		</div>

		<div class="field">
			<label for="email">Email <abbr title="required">•</abbr></label>
			<input type="email" id="email" name="email" value="<?= esc(get('email')) ?>" required>
		</div>

		<div class="field honeypot">
			<label for="subject">Honeypot</label>
			<input type="text" id="subject" name="subject">
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