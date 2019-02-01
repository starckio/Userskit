<?php

return function ($kirby) {

  if($kirby->user()) go('/');

	$error = null;

	if($kirby->request()->is('POST') and get('register')) {

		$data = [
			'name'             => get('name'),
			'email'            => get('email'),
			'password'         => get('password'),
			'validatepassword' => get('validatepassword')
		];

		$rules = [
			'email'    => array('required', 'email'),
			'password' => array('required', 'min' => 8),
		];

		$messages = [
			'email'    => 'The email address is invalid',
			'password' => 'Password with at least 8 characters.'
		];

		if($invalid = invalid($data, $rules, $messages)) {
			$error = $invalid;
		} else {

			try {

			  if(v::same($data['password'], $data['validatepassword'])) {

				  $kirby->impersonate('kirby');

  				$user = $kirby->users()->create([
  				  'name'     => $data['name'],
  				  'email'    => $data['email'],
  				  'password' => $data['password'],
  				  'language' => 'en',
  				  'role'     => 'editor'
  				]);

          $user->logout();

  				$success = 'Welcome <strong>' . $user->name() . '</strong>.<br />Your account has been created !';

  			} else {
  			  $failed = 'The password is not the same.';
  			}

			} catch(Exception $e) {

				$failed = 'Your registration failed:<br />' . $e->getMessage();

			}
		}
	}

	return compact('error', 'success', 'failed');
};