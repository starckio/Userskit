<?php

return function ($kirby) {

  $user = $kirby->user();
  if(!$user) go('login');

	$error = null;

	if($kirby->request()->is('POST') and get('update')) {

		$data = [
			'name'  => esc(get('name')),
			'email' => esc(get('email'))
		];

		$rules = [
			'name'  => array('required'),
			'email' => array('required', 'email'),
		];

		$messages = [
			'name'  => 'Please, enter a valid name.',
			'email' => 'The email address is invalid.',
		];

		if($invalid = invalid($data, $rules, $messages)) {
			$error = $invalid;
		} else {

			try {

				$user = $kirby->user()->update([
					'name'  => $user->changeName($data['name']),
					'email' => $user->changeEmail($data['email'])
				]);

				$success = 'Your informations has been successfully updated.';
				$data = array();

			} catch(Exception $e) {

				$failed = 'Your update failed:<br />' . $e->getMessage();

			}
		}
	}

	return compact('error', 'success', 'failed', 'user', 'data');
};