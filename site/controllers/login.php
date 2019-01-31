<?php

return function($kirby) {

  if($kirby->user()) go('/');

  $error = null;

  if($kirby->request()->is('POST') and get('login')) {

    if($user = $kirby->user(get('email')) and $user->login(get('password'))) {
      go('/');
    } else {
      $error = '<strong>Email</strong> or <strong>password</strong> invalid.';
    }

  }

  return compact('error');
};