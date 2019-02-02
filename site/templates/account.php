<?php snippet('header') ?>

<main class="main" role="main">

	<?php if(isset($success)): ?>
  <h1 class="center">🎉 Successfully updated 🎉</h1>
  <div class="alert success">
    <p><?= $success ?></p>
  </div>
  <?php else: ?>

  <h1 class="center"><?= $page->title() ?></h1>

  <?php endif ?>

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
			<label for="name">Full name <abbr title="required">•</abbr></label>
			<input type="text" id="name" name="name" value="<?= isset($data['name']) ? esc($data['name']) : $kirby->user()->name() ?>" required>
    </div>

    <div class="field">
			<label for="email">Email <abbr title="required">•</abbr></label>
			<input type="text" id="email" name="email" value="<?= isset($data['email']) ? esc($data['email']) : $kirby->user()->email() ?>" required>
    </div>

    <div class="submit">
      <button type="submit" name="update" value="update">Save</button>
      <p><abbr title="required">•</abbr> Required fields.</p>
    </div>

  </form>

  <div class="otherlink">
    <a href="<?= url('account/password') ?>">Change password?</a><?php if(!$kirby->user()->isAdmin()): ?> or <a href="<?= url('account/delete') ?>">Delete your account?</a><?php endif ?>
  </div>

</main>

<?php snippet('footer') ?>