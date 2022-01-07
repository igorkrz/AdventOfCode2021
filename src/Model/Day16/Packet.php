<?php

namespace App\Model\Day16;

class Packet
{
    use PackageTrait;

    private string $binString;

    private int $packetVersion;

    private string $id;

    private int $length = 0;

    private int $packetVersionSum = 0;

    private int $value = 0;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getPacketVersionSum(): int
    {
        return $this->packetVersionSum;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }
}