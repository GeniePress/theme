<?php

namespace Theme;

use Lnk7\GeniePress\Genie;
use Theme\PostTypes\Page;
use Theme\PostTypes\Post;
use Theme\PostTypes\Testimonial;
use Theme\Templates\ContactForm;

require 'vendor/autoload.php';

Genie::createTheme()
	->withComponents([
		Theme::class,
		ContactForm::class,
		Page::class,
		Post::class,
		Testimonial::class
	])
	->start();
