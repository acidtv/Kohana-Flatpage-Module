<?php defined('SYSPATH') or die('No direct script access.');

// Route to flatpage controller
Route::set('flatpages', Kohana::config('flatpages.route'), array('label' => '.*'))
	->defaults(array(
		'controller' => 'flatpage',
		'action' => 'index',
		'label' => null,
	));

