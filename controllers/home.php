<?php

// ==========================================================================================================================
//                                                     HOME CONTROLLER
// ==========================================================================================================================

$data['posts'] = get('posts');

$data['title'] = 'Home';

view('home', $data);
