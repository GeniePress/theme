<?php

namespace Theme\Templates;

use Lnk7\GeniePress\Interfaces\GenieComponent;
use Lnk7\GeniePress\Utilities\RegisterAjax;

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
