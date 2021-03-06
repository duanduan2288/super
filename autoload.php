<?php
	function classLoader($class){
		$path = str_replace('\\',DIRECTORY_SEPARATOR,$class);

		$file = __DIR__ . DIRECTORY_SEPARATOR .'src'. DIRECTORY_SEPARATOR .'logger'.DIRECTORY_SEPARATOR . $path . '.php';
		if (file_exists($file)) {
			require_once $file;
		}

		$file = __DIR__ . DIRECTORY_SEPARATOR .'src'. DIRECTORY_SEPARATOR .'mail'.DIRECTORY_SEPARATOR . $path . '.php';
		if (file_exists($file)) {
			require_once $file;
		}

		$file = __DIR__ . DIRECTORY_SEPARATOR .'src'. DIRECTORY_SEPARATOR .'soap'.DIRECTORY_SEPARATOR . $path . '.php';
		if (file_exists($file)) {
			require_once $file;
		}

		$file = __DIR__ . DIRECTORY_SEPARATOR .'config'. DIRECTORY_SEPARATOR . $path . '.php';
		if (file_exists($file)) {
			require_once $file;
		}
		//$file = __DIR__ . DIRECTORY_SEPARATOR .'interfaces'. DIRECTORY_SEPARATOR . $path . '.php';
		//if (file_exists($file)) {
		//	require_once $file;
		//}
	}
spl_autoload_register("classLoader");