<?php

namespace Rbarden\RFEmissionDesignator;

final readonly class EmissionDesignator
{
    private function __construct(
        public string             $fullDesignator,
        public CharacteristicData $characteristicData,
        public BandwidthData|null $bandwidth = null,
    )
    {}

    public static function from(string $designator): self
    {
        $designator = strtoupper($designator);
        $length = strlen($designator);

        if ($length === 3) {
            return new self(
                $designator,
                CharacteristicData::from($designator),
            );
        } else if ($length === 7) {
            return new self(
                $designator,
                CharacteristicData::from(substr($designator, -3)),
                BandwidthData::from(substr($designator, 0, 4))
            );
        } else {
            throw new \InvalidArgumentException('Designator must be 3 or 7 characters long.');
        }
    }
}