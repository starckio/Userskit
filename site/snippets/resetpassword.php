<?php $site = site(); ?>
Send reset subject

Hello <?php echo $name ?>,

<a href="<?php echo $site->url() ?>/token/<?php echo $token ?>">Reset link</a>