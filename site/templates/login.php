<?php snippet('header') ?>

<main class="main" role="main">

  <h1 class="center"><?= $page->title() ?></h1>

  <?php if($error): ?>
  <div class="alert error">
    <p><?= $error ?></p>
  </div>
  <?php endif ?>

  <form method="POST">

    <div class="field">
      <label for="username">Email <abbr title="required">•</abbr></label>
      <input type="text" id="username" name="username" value="<?= esc(get('username')) ?>" required>
    </div>

    <div class="field">
      <label for="password">
        Password <abbr title="required">•</abbr>
        <small><a href="<?= url('account/reset') ?>">Forgot password ?</a></small>
      </label>
      <input type="password" id="password" name="password" required>
    </div>

    <div class="submit">
      <button type="submit" name="login" value="login">Sign in</button>
      <p><abbr title="required">•</abbr> Required fields.</p>
    </div>

  </form>

  <div class="otherlink">Not a member? <a href="<?= url('account/signup') ?>">Sign up now</a></div>

</main>

<?php snippet('footer') ?>