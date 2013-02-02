<?php

/**
 * Autoloader to handle all the WHMCS classes
 *
 * @package   WHMCS
 * @author    Joshua Priddle <jpriddle@nevercraft.net>
 * @version   v0.0.1
 * @copyright 2011 DotBlock Inc
 */

function whmcsLoader($class) {
	if (preg_match('/WHMCS_/', $class)) {
		$class = str_replace('\\', '/', $class);
		$class = str_replace('WHMCS_', '', $class);
		$class = strtolower($class);
		
		$file = $class . '.php';
		
		require_once __dir__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $file;
	}
}

spl_autoload_register('whmcsLoader');
