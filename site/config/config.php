<?php

return [
  'debug'  => true,

  'routes' => [
    [
      'pattern' => 'logout',
      'action'  => function() {
        $kirby   = kirby();
        if ($user = $kirby->user()) {
          $user->logout();
        }
        go('login');
      }
    ],
    [
    	'pattern' => 'token/([a-f0-9]{32})',
    	'action'  => function($token) {
    		$kirby   = kirby();

    		if ($user = $kirby->user()) {
    		  $user->logout();
    		}

    		if ($user = $kirby->users()->findBy('token', $token)) {

    			$kirby->impersonate('kirby');

    			$user->update([
    				'token'    => '',
    				'password' => $token,
    			]);

    			if ($user->login($token)) {
    				return go('/account/password');
    			} else {
    				return go('/');
    			} 
    		} else {
    			return go('/');
    		}
    	}
    ],
  ],
];