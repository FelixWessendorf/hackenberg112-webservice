<?php

define("STARTUP_TIME", microtime(true));
define("BASE_DIR", realpath(implode(DIRECTORY_SEPARATOR, array(__DIR__, ".."))));

error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", "On");

mb_internal_encoding("UTF-8");
date_default_timezone_set("Europe/Berlin");

setlocale(LC_ALL, "de_DE.UTF8");

spl_autoload_register(function ($strClassName) {
	$strClassFilePath = implode(DIRECTORY_SEPARATOR, array(BASE_DIR, "core", $strClassName . ".class.php"));
	if (is_readable($strClassFilePath)) require_once($strClassFilePath);
});

require BASE_DIR . '/configuration.inc.php';
require BASE_DIR . '/module/qcodo/includes/prepend.inc.php';

header_remove("x-powered-by");

Api::Listen();
