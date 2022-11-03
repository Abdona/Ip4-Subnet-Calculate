<?php

class Network
{
    private array $ipUpperRange;
    private array $subNetMask;
    #private int $numberOfConnectedDevices;

    public function __construct()
    {
        $this->ipUpperRange = ['A'=> 127, 'B'=> 191, 'C'=> 223, 'D'=> 239,'E'=> 255];
        $this->subNetMask = ['A'=> '255.0.0.0', 'B'=> '255.255.0.0', 'C'=> '255.255.255.0'];
    }

    public function getSubNetMask(): array
    {
        return $this->subNetMask;
    }

    ##public function getNumberOfConnectedDevices(): int
    ##{
        ##return $this->numberOfConnectedDevices;
    ##}

    public function defineClassType(string $ip): string
    {
        $firstBlockFromIpAddress = explode('.',$ip)[0];
        foreach ($this->ipUpperRange as $classType => $classRange) {
            if ($firstBlockFromIpAddress <= $classRange){
                return $classType;
            }
        }
        return '0';
    }
}
