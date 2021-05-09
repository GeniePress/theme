<?php

namespace Theme;

use GeniePress\Genie;
use Theme\PostTypes\Page;
use Theme\PostTypes\Post;
use Theme\Templates\ContactForm;

require 'vendor/autoload.php';

Genie::createTheme()
    ->enableApiHandler()
    ->enableAjaxHandler()
    ->enableSessions('theme_session')
    ->enableCacheBuster()
    ->enableDeploymentHandler()
    ->withComponents([
        Theme::class,
        ContactForm::class,
        Page::class,
        Post::class,
    ])
    ->start();
