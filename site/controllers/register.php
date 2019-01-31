<?php

return function ($kirby) {

	$error = null;

	if($kirby->request()->is('POST') and get('register')) {

		$data = [
			'name'     => get('name'),
			'email'    => get('email'),
			'password' => get('password')
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
				$data = array();

			} catch(Exception $e) {

				$failed = 'Your registration failed: ' . $e->getMessage();

			}
		}
	}

	return compact('error', 'success', 'failed');
};