<?php

namespace Rbarden\RFEmissionDesignator;

use Rbarden\RFEmissionDesignator\Types\CarrierType;
use Rbarden\RFEmissionDesignator\Types\InformationType;
use Rbarden\RFEmissionDesignator\Types\ModulationType;

final readonly class CharacteristicData
{
    private function __construct(
        public ModulationType  $modulation,
        public CarrierType     $carrier,
        public InformationType $information,
    )
    {}

    public static function from(string $designator): self
    {
        return new self(
            ModulationType::tryFrom($designator[0]),
            CarrierType::tryFrom($designator[1]),
            InformationType::tryFrom($designator[2]),
        );
    }
}