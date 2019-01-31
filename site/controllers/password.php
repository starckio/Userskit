<?php

return function ($kirby) {

  $user = $kirby->user();
  if(!$user) go('login');

	$error = null;

	if($kirby->request()->is('POST') and get('update')) {

		$data = [
			'password' => esc(get('password')),
		];
		$rules = [
			'password' => array('required', 'min' => 8),
		];
		$messages = [
			'password' => 'Please enter a password.',
		];

		if($invalid = invalid($data, $rules, $messages)) {
			$error = $invalid;
		} else {

			try {

			  $user = $kirby->user()->update([
			  	'password' => $user->changePassword($data['password']),
			  ]);

				$success = 'Your passwords have been changed successfully.';

			} catch(Exception $e) {

				$failed = 'There was a problem changing your password.' . $e->getMessage();

			}
		}
	}

	return compact('error', 'success', 'failed', 'user');
};