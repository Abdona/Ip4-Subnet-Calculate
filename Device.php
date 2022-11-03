<?php

class Device
{
    private string $ip;
    private string $netId;

    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getNetId(): string
    {
        return $this->netId;
    }

    public function calculateNetId (string $classType,string $networkAddress): string
    {
        $networkAddress = explode('.',$this->ip);
        $this->netId = match ($classType) {
            "A" => implode('.', array_slice($networkAddress, 0, 1)),
            "B" => implode('.', array_slice($networkAddress, 0, 2)),
            "C" => implode('.', array_slice($networkAddress, 0, 3)),
            default => implode('.', array_slice($networkAddress, 0, 4)),
        };
        return $this->netId;
    }
}