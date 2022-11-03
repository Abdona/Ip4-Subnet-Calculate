<?php

class Network
{
    private array $ipUpperRange;
    private array $subNetMask;
    private string $networkClass;
    #private int $numberOfConnectedDevices;

    public function __construct()
    {
        $this->ipUpperRange = ['A'=> 127, 'B'=> 191, 'C'=> 223, 'D'=> 239,'E'=> 255];
        $this->subNetMask = ['A'=> '255.0.0.0', 'B'=> '255.255.0.0', 'C'=> '255.255.255.0'];
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
                $this->networkClass = $classType;
                return $this->networkClass;
            }
        }
        return '0';
    }

    public function getSubnetMaskForProperClass(): string
    {
        return $this->subNetMask[$this->networkClass];
    }

    public function numberOfPossibleClients(): int
    {
        return match ($this->networkClass) {
           "A"=>16777214,
           "B"=>65534,
           "C"=>254,
           "D", "E" =>0
        };
    }
}
