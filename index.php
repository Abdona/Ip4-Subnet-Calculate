<?php

require_once ('Network.php');
require_once ('Device.php');

$network = new Network();
$device = new Device('192.168.1.1',$network);

var_dump($network->defineClassType($device->getIp()));

