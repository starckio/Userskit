<?php

return function($kirby) {

  if($kirby->user()) go('/');

  $error = null;

  if($kirby->request()->is('POST') and get('reset')) {

		if(!empty(get('subject'))) {
			go($page->url());
			exit;
		}

		if($user = $kirby->users()->findBy('email', get('email'))) {

      $kirby->impersonate('kirby');

			do {
				$bytes = openssl_random_pseudo_bytes(16, $crypto_strong);
				$token = bin2hex($bytes);
			} while(!$crypto_strong);
		
			// Add the token to the user's profile
			$kirby->user(get('email'))->update([
				'token' => $token,
			]);
		
			// Build the email text
			$to      = $user->email();
			$from    = 'noreply@'.str_replace('www.', '', server::get('server_name'));
			$subject = 'Send reset subject';
			$body    = snippet('resetpassword', $user->data(), true);
		
			// Send the confirmation email
			$email = $kirby->email([
				'to'      => $to,
				'from'    => $from,
				'subject' => $subject,
				'body'    => $body,
				'service' => 'html-mail'
			]);

			if(v::email($from) and v::email($to) and $email->send()) {

				$success = 'You will receive an email with instructions to reset your password.';

			} else {

				$error = 'We were unable to send your account verification email. Please try again later.';

			}

		} else {

			$error = 'No account corresponding to the email.';

		}
	}

	// Passer les variables au modèle
	return compact('error', 'success');
};