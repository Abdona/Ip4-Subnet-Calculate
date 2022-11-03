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

    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    public function getNetId(): string
    {
        return $this->netId;
    }

    public function setNetId(string $netId): void
    {
        $this->netId = $netId;
    }

    public function getNetwork(): Network
    {
        return $this->network;
    }

    public function setNetwork(Network $network): void
    {
        $this->network = $network;
    }
}