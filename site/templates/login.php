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
      <label for="email">Email <abbr title="required">*</abbr></label>
      <input type="email" id="email" name="email">
    </div>

    <div class="field">
      <label for="password">Password <abbr title="required">*</abbr></label>
      <input type="password" id="password" name="password">
    </div>

    <div class="submit">
      <button type="submit" name="login" value="login">Login</button>
      <a href="<?= url('account/register') ?>">Register</a>
    </div>

    <div class="submit">
      <a href="<?= url('account/reset') ?>">Reset your password</a>	
    </div>

  </form>

</main>

<?php snippet('footer') ?>