<?php

return function ($kirby) {

  $user = $kirby->user();
  if(!$user) go('login');

	$error = null;

	if($kirby->request()->is('POST') and get('delete')) {

		$data = [
			'password' => esc(get('password')),
		];
		$rules = [
			'password' => array('required', 'min' => 8),
		];
		$messages = [
			'password' => 'Please enter your password.',
		];

		if($invalid = invalid($data, $rules, $messages)) {
			$error = $invalid;
		} else {

			try {

				$kirby->user($user->email())->delete();

				$user->logout();

				$success = 'The user has been deleted';

			} catch(Exception $e) {

				$error = 'The user could not be deleted';

			}
		}
	}

	return compact('error', 'success');
};