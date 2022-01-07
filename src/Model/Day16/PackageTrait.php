<?php

namespace App\Model\Day16;

use App\Enum\Day16\HexEnum;

trait PackageTrait
{
    private string $binString;

    private int $packetVersion;

    private string $id;

    private int $length = 0;

    private int $packetVersionSum = 0;

    private int $value = 0;

    public function __construct(string $binString)
    {
        $this->binString = $binString;
        $this->length = strlen($this->binString);
        $this->packetVersion = (int)HexEnum::BIN[substr($this->binString, 0, 3)];
        $this->id = HexEnum::BIN[substr($this->binString, 3, 3)];
        $this->decodePacket();
        $this->packetVersionSum += $this->packetVersion;
    }

    /**
     * @return int|array
     */
    private function decodePacket()
    {
        if ($this->getId() === '4') {
            return $this->decodeLiteralPacket($this->binString);
        }

        return $this->decodeOperatorPacket($this->binString);
    }

    /**
     * @param string $binString
     * @return int
     */
    private function decodeLiteralPacket(string $binString): int
    {
        $offset = 6;
        $result = '';

        while (substr($binString, $offset, 1) !== '0') {
            $result .= substr($binString, $offset + 1, 4);
            $offset += 5;
        }

        $result .= substr($binString, $offset + 1, 4);
        $this->length = $offset + 5;

        $this->binString = substr($this->binString, 0, $this->length);
        $this->value = bindec($result);

        return $this->value;
    }

    /**
     * @param string $binString
     * @return array
     */
    private function decodeOperatorPacket(string $binString): array
    {
        $this->length = 7;

        $subPackets = [];
        $values = [];

        $lengthId = substr($binString, 6, 1);
        if ($lengthId === '0') {
            $totalLength = bindec(substr($binString, 7, 15));
            $offset = 22;

            while ($offset < $totalLength + $offset) {
                $newBinString = substr($binString, $offset, $totalLength);
                $packet = new Packet($newBinString);
                $subPackets[] = $packet;

                $offset += $packet->getLength();
                $totalLength -= $packet->getLength();

                $this->length += $packet->getLength();
                $this->packetVersionSum += $packet->getPacketVersionSum();

                $values[] = $packet->getValue();
            }

            $this->length += 15;
        } else {
            $totalLength = bindec(substr($binString, 7, 11));
            $offset = 18;

            for ($i = 0; $i < $totalLength; $i++) {
                $newBinString = substr($binString, $offset);
                $packet = new Packet($newBinString);
                $subPackets[] = $packet;

                $offset += $packet->getLength();

                $this->length += $packet->getLength();
                $this->packetVersionSum += $packet->getPacketVersionSum();

                $values[] = $packet->getValue();
            }

            $this->length += 11;
        }

        switch ($this->id) {
            case 0:
                $this->value = intval(array_sum($values));
                break;
            case 1:
                $this->value = intval(array_product($values));
                break;
            case 2:
                $this->value = intval(min($values));
                break;
            case 3:
                $this->value = intval(max($values));
                break;
            case 5:
                $this->value = $values[0] > $values[1] ? 1 : 0;
                break;
            case 6:
                $this->value = $values[0] < $values[1] ? 1 : 0;
                break;
            case 7:
                $this->value = $values[0] == $values[1] ? 1 : 0;
                break;
        }

        return $subPackets;
    }
}