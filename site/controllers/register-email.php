<?php

return function ($site, $pages, $page) {

	// Ne pas afficher l'écran de connexion aux utilisateurs déjà connectés
	if($site->user()) go('/');

	$error = null;

	if(r::is('post') && get('register')) {
		// Disons au robot que tout va bien
		if(!empty(get('subject'))) {
			go($page->url());
			exit;
		}

		// Le nom d'utilisateur sera l'adresse courriel avec la ponctuation supprimée.
		// Les utilisateurs finaux ne l'utiliseront pas, nous avons juste besoin d'un ID unique pour le compte.
		$username = str::slug(get('email'),'');

		// Vérifie les doublons de comptes
		$duplicateEmail = $site->users()->findBy('email',trim(get('email')));
		$duplicateUsername = $site->users()->findBy('username',$username);

		if(count($duplicateEmail) === 0 and count($duplicateUsername) === 0) {
			try {
				// Mot de passe aléatoire pour la configuration initiale.
				// L'utilisateur va créer son propre mot de passe après la vérification par adresse courriel.
				$password = bin2hex(openssl_random_pseudo_bytes(16));

				// Créer un compte
				$user = $site->users()->create(array(
					'username'  => $username,
					'firstname' => trim(get('firstname')),
					'lastname'  => trim(get('lastname')),
					'email'     => trim(get('email')),
					'password'  => $password
				));

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
				$from    = 'noreply@'.str_replace('www.', '', server::get('server_name'));
				$subject = l::get('membership.send.active.subject');
				$body    = snippet('activeaccount', $user->data(), true);

				// Send the confirmation email
				$email = new Email(array(
					'to'      => $to,
					'from'    => $from,
					'subject' => $subject,
					'body'    => $body,
					'service' => 'html-mail'
				));

				if(v::email($from) and v::email($to) and $email->send()) {
					$success = l::get('membership.register.send.success');
				} else {
					$error = l::get('membership.register.send.error');
				}

			} catch(Exception $e) {
				$error = l::get('membership.register.input.error');
			}
		} else {
			$error = l::get('membership.register.email.exist');
		}
	}

	// Passer les variables au modèle
	return compact('error', 'success');
};