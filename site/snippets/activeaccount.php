<?php $site = site(); ?>
Send active subject

Hello <?php echo $firstname ?>,
<a href="<?php echo $site->url() ?>/token/<?php echo $token ?>">Active link</a>