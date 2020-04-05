<?php 

namespace Src\AppClass;

final class SlimConfig
{
	public static function slimConfig()
	{
		$configuration = [
			'settings' => [
				'displayErrorDetails' => DISPLAY_ERROR_DETAILS,
			],
		];
		return new \Slim\Container($configuration);
	}
}