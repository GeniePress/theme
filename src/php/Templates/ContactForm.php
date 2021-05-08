<?php

namespace Theme\Templates;

use GeniePress\Interfaces\GenieComponent;
use GeniePress\Utilities\RegisterAjax;

class ContactForm implements GenieComponent
{

	public static function setup()
	{

		RegisterAjax::url('contact-form')
			->run(function (string $email, string $name, string $message) {
				// Do something
			});

	}


}
