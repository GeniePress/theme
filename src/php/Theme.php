<?php

namespace Theme;

use GeniePress\Interfaces\GenieComponent;
use GeniePress\Utilities\HookInto;

class Theme implements GenieComponent
{

	public static function setup()
	{

		/**
		 * Set the cookie name for the session
		 */
		HookInto::filter('genie_session_name')
			->run(function ($name) {
				return 'theme_session';
			});


		/**
		 * Set the cookie name for the options Key
		 */
		HookInto::filter('genie_option_key')
			->run(function ($name) {
				return 'theme_options';
			});


		/**
		 * After Theme Setup
		 */
		HookInto::action('after_setup_theme')
			->run(function () {
				register_nav_menu('primary', __('Primary Menu', 'geniepress'));
				add_theme_support('automatic-feed-links');
				add_theme_support('post-thumbnails');
			});


		/**
		 * Add our js and css files.
		 */
		HookInto::action('wp_enqueue_scripts')
			->run(function () {
				wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/dist/theme.js', [], false, true);
				wp_enqueue_style('theme-css', get_stylesheet_directory_uri() . '/dist/theme.css');
			});


		/**
		 * Hook into Genie and pass in our variables
		 */
		HookInto::filter('genie_view_variables')
			->run(function ($vars) {
				$vars['theme'] = new ThemeFunctions();
				$vars['site']  = [
					'theme_dir' => get_stylesheet_directory_uri(),
					'home_url'  => home_url(),
					'debug'     => WP_DEBUG,
				];

				return $vars;
			});


		/**
		 * Let's get rid of jQuery
		 */
		HookInto::filter('wp_default_scripts')
			->run(function (&$scripts) {
				if (!is_admin()) {
					$scripts->remove('jquery');
				}
			});

	}


}
