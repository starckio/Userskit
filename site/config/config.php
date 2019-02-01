<?php

return [
  'debug'  => true,

  'email' => [
    'transport' => [
      'type' => 'smtp',
      'host' => 'mail.smtp.com',
      'port' => 465,
      'security' => true,
      'auth' => true,
      'username' => 'contact@domain.ltd',
      'password' => '---',
    ]
  ],

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
    		$kirby->impersonate('kirby');

    		if ($user = $kirby->user()) {
    		  $user->logout();
    		}

    		if ($user = $kirby->users()->findBy('token', $token)) {

    			$user->update([
    				'token'    => '',
    				'password' => $user->changePassword($token),
    			]);

    			if ($user->login($token)) {
    				go('/account/password');
    			} else {
    				go('/');
    			} 
    		} else {
    			go('/');
    		}
    	}
    ],
  ],
];