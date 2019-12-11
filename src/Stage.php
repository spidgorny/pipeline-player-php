<?php

use Docker\Docker;

class Stage
{

	public $stage;

	public $services = [];

	public $image;

	public $script = [];

	public $artifacts;

	public static function getInstance(array $config)
	{
		$i = new static();
		foreach ($config as $key => $val) {
			$i->$key = is_array($val) ?
				(is_assoc($val) ? (object)$val : $val)
				: $val;
		}
		return $i;
	}

	public function run()
	{

		$docker = Docker::create();
		$containers = $docker->containerList();

		foreach ($containers as $container) {
			var_dump($container->getNames());
		}
	}

}
