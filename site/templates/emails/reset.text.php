<?php $site = site(); ?>
Hi <?= $name ?>

<?= $text ?>
Reset your password : <?= $site->url() ?>/token/<?= $token ?>