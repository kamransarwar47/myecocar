<?php
require_once("lib/Payplug.php");
$parameters = Payplug::loadParameters("msel@laposte.net", "67000strasbourg");
$parameters->saveInFile("parameters.json");
?>