<?php
/*
 * Template name: Contact Form
 */

use GeniePress\View;
use Theme\PostTypes\Page;

View::with('templates\contact-form.twig')
	->addVar('page', Page::getCurrent())
	->display();
