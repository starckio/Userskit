<?php

return function ($kirby, $page) {

	if($kirby->user()) go('/');
	$error = null;

	if($kirby->request()->is('POST') and get('reset')) {

		// Disons au robot que tout va bien
		if(!empty(get('subject'))) {
			go($page->url());
			exit;
		}

		try {

  		if($user = $kirby->users()->findBy('email', get('email'))) {
        $kirby->impersonate('kirby');
  
  			// Generate a secure random 32-character hex token
  			do {
  				$bytes = openssl_random_pseudo_bytes(16, $crypto_strong);
  				$token = bin2hex($bytes);
  			} while(!$crypto_strong);
  		
  			// Add the token to the user's profile
  			$kirby->user(get('email'))->update([
  				'token' => $token,
  			]);
  		
  			// Build the email text
  			$to      = get('email');
  			$from    = 'contact@starck.io';
  			$subject = 'Reset your password.';
  
  			// Send the confirmation email
  			if(v::email($from) and v::email($to)) {
  			  $email = $kirby->email([
    			  'to'       => $to,
    			  'from'     => $from,
    			  'subject'  => $subject,
    			  'template' => 'reset',
    			  'data'     => [
    			    'name'   => $user->name(),
    			    'token'  => $token,
    			    'text'   => 'Someone (hopefully it was you) asked us to reset the password for your '.str_replace('www.', '', $_SERVER['HTTP_HOST']).' account.
    			    	Click on the button below to get there. If you have not asked to reset your password, skip this message!'
    			  ]
    			]);

  				$success = 'You will receive an email with instructions to reset your password.';
  			} else {
  				$error = 'We were unable to send your account verification email. Please try again later.';
  			}
  
  		} else {
  			$error = 'No account corresponding to the email.';
  		}

		} catch(Exception $e) {
			$error = 'Failed:<br />' . $e->getMessage();
		}


	}
	return compact('error', 'success');
};