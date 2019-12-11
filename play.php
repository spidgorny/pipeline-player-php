<?php

use Symfony\Component\Yaml\Yaml;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/src/functions.php';

$pathToFile = '.gitlab-ci.yml';

$config = Yaml::parseFile($pathToFile);

var_debug($config['stages']);

foreach ($config['stages'] as $stage) {
	runStage(Stage::getInstance($config[$stage]));
	break;
}

function runStage(Stage $stage)
{
//	var_debug($stage);
	echo $stage->stage, PHP_EOL;
	echo $stage->image, PHP_EOL;
	$stage->run();
}

