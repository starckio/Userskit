<?php

return function ($kirby, $page) {

	if($kirby->user()) go('/');
	$error = null;

	if($kirby->request()->is('POST') and get('register')) {

		// Disons au robot que tout va bien
		if(!empty(get('subject'))) {
			go($page->url());
			exit;
		}

		try {
      $kirby->impersonate('kirby');
			$password = bin2hex(openssl_random_pseudo_bytes(16));

			// Créer un compte
			$user = $kirby->users()->create([
				'name'     => trim(get('name')),
				'email'    => trim(get('email')),
				'password' => $password,
				'role'     => 'editor',
			]);

			// Generate a secure random 32-character hex token
			do {
				$bytes = openssl_random_pseudo_bytes(16, $crypto_strong);
				$token = bin2hex($bytes);
			} while(!$crypto_strong);

			// Add the token to the user's profile
			$user->update([
				'token' => $token,
			]);

			// Build the email text
			$to      = $user->email();
			$from    = 'contact@starck.io';
			$subject = 'Active your account.';

			// Send the confirmation email
			if(v::email($from) and v::email($to)) {
  			$email = $kirby->email([
  			  'to'       => $to,
  			  'from'     => $from,
  			  'subject'  => $subject,
  			  'template' => 'active',
  			  'data'     => [
  			    'name'   => $user->name(),
  			    'token'  => $token,
  			    'text'   => 'Thank you for registering on '.str_replace('www.', '', $_SERVER['HTTP_HOST']).'. Go to the link below to activate your account and choose your password.'
  			  ]
  			]);

  			$user->logout();
				$success = 'Your account has been created! You will receive an email to activate it.';

			} else {
				$error = 'We were unable to send your account verification email. Contact the store owner directly to activate your account.';
			}

		} catch(Exception $e) {
			$error = 'Failed:<br />' . $e->getMessage();
		}


	}
	return compact('error', 'success');
};