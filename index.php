<?php

require_once ('Network.php');
require_once ('Device.php');

$network = new Network();
$device = new Device('194.168.1.1',$network);

$classType = $network->defineClassType($device->getIp());
echo $classType;
echo "<br>";
$subnetMask = $network->getSubnetMaskForClass();
echo($subnetMask);
echo "<br>";
$networkAddress = $network->calculateNetworkAddress($device->getIp());
echo($networkAddress);
echo "<br>";
$networkId = $device->calculateNetId($classType,$networkAddress);
echo($networkId);
