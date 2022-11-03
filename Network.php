<?php

class Network
{
    private array $ipUpperRange;
    private array $subNetMasks;
    private string $networkClass;
    private string $networkAddress;
    private string $subNetMask;

    public function __construct()
    {
        $this->ipUpperRange = ['A'=> 127, 'B'=> 191, 'C'=> 223, 'D'=> 239,'E'=> 255];
        $this->subNetMasks = ['A'=> '255.0.0.0', 'B'=> '255.255.0.0', 'C'=> '255.255.255.0'];
        $this->networkAddress = '';
    }

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

    public function getSubnetMaskForClass(): string
    {
        $this->subNetMask = $this->subNetMasks[$this->networkClass];
        return $this->subNetMask ;
    }

    public function numberOfPossibleConnectedClients(): int
    {
        return match ($this->networkClass) {
           "A"=>16777214,
           "B"=>65534,
           "C"=>254,
           "D", "E" =>0
        };
    }

    public function calculateNetworkAddress(string $hostIp):string
    {
        $hostIp = explode('.', $hostIp);
        $subnetMask = explode('.', $this->subNetMask);
        while ($hostIp){
            $this->networkAddress =
                (intval(array_pop($hostIp)) & intval(array_pop($subnetMask))) .
                '.' . $this->networkAddress;
        }

        return $this->networkAddress;
    }
}
