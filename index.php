<?php

require_once ('Network.php');
require_once ('Device.php');

$network = new Network();
$device = new Device('192.168.1.1',$network);


echo $network->defineClassType($device->getIp());
echo "<br>";
echo($network->getSubnetMaskForProperClass());
echo "<br>";
echo($device->calculateNetId($network->defineClassType($device->getIp())));

