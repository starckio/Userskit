<?php

return function ($kirby) {

  $user = $kirby->user();
  if(!$user) go('login');

	$error = null;

	if($kirby->request()->is('POST') and get('update')) {

		$data = [
			'password'         => get('password'),
			'validatepassword' => get('validatepassword')
		];
		$rules = [
			'password' => array('required', 'min' => 8),
		];
		$messages = [
			'password' => 'Password with at least 8 characters.',
		];

		if($invalid = invalid($data, $rules, $messages)) {
			$error = $invalid;
		} else {

			try {

			  if(v::same($data['password'], $data['validatepassword'])) {

  			  $user = $kirby->user()->update([
  			  	'password' => $user->changePassword($data['password']),
  			  ]);

				  $success = 'Your passwords have been changed successfully.';

  			} else {
  			  $failed = 'The passwords are not identical.';
  			}

			} catch(Exception $e) {

				$failed = 'There was a problem changing your password.<br />' . $e->getMessage();

			}
		}
	}

	return compact('error', 'success', 'failed', 'user');
};