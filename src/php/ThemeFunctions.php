<?php

namespace Theme;

class ThemeFunctions
{

	/**
	 * Magic function for twig to call WordPress functions
	 *
	 *  for example:
	 * {% theme.wp_footer() %}
	 *
	 * @param $function
	 * @param $arguments
	 *
	 * @return mixed
	 */
	public function __call($function, $arguments)
	{
		if (function_exists($function)) {
			return call_user_func_array($function, $arguments);
		}
	}

}
