<?php

return function ($kirby) {

  if(!$kirby->user()) go('login');

	$error = null;

	if($kirby->request()->is('POST') and get('update')) {

		try {

	    $password = esc(get('password'));
	    $validate = esc(get('validate'));

	    if(v::same($password, $validate)) {

			  $kirby->user()->update([
			  	'password' => $kirby->user()->changePassword($password),
			  ]);

		    $success = 'Your passwords have been changed successfully.';

		  } else { // v::same

		    $error = 'Please note, passwords must be identical!';

		  }

		} catch(Exception $e) {

			$error = $e->getMessage();

		}

	}

	return compact('error', 'success');
};