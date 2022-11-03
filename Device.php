<?php

class Device
{
    private string $ip;
    private string $netId;
    private Network $network;

    public function __construct(string $ip, Network $network)
    {
        $this->ip = $ip;
        $this->network = $network;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getNetId(): string
    {
        return $this->netId;
    }

    public function calculateNetId (string $classType): string
    {
        $ipSeperated = explode('.',$this->ip);
        return match ($classType) {
            "A" => implode('.', array_slice($ipSeperated, 0, 1)),
            "B" => implode('.', array_slice($ipSeperated, 0, 2)),
            "C" => implode('.', array_slice($ipSeperated, 0, 3)),
            default => implode('.', array_slice($ipSeperated, 0, 4)),
        };
    }
}