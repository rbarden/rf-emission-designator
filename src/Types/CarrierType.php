<?php

namespace Rbarden\RFEmissionDesignator\Types;

/**
 * 47 CFR 2.201(d)
 * @link https://www.ecfr.gov/current/title-47/part-2/subpart-C#p-2.201(d)
 */
enum CarrierType: string
{
    case Zero = '0';
    case One = '1';
    case Two = '2';
    case Three = '3';
    case Seven = '7';
    case Eight = '8';
    case Nine = '9';
    case X = 'X';

    public function description(): string
    {
        return match ($this) {
            self::Zero => 'No modulating signal',
            self::One => 'Quantized/Digital - single channel, no modulating sub-carrier',
            self::Two => 'Quantized/Digital - single channel, with modulating sub-carrier',
            self::Three => 'Analog - single channel',
            self::Seven => 'Quantized/Digital - two or more channels',
            self::Eight => 'Analog - two or more channels',
            self::Nine => 'Quantized/Digital + Analog - one or more of each',
            self::X => 'Not otherwise covered',
        };
    }
}
