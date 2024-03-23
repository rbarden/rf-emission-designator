<?php

namespace Rbarden\RFEmissionDesignator\Types;

/**
 * 47 CFR 2.201(e)
 * @link https://www.ecfr.gov/current/title-47/part-2/subpart-C#p-2.201(e)
 */
enum InformationType: string
{
    case N = 'N';
    case A = 'A';
    case B = 'B';
    case C = 'C';
    case D = 'D';
    case E = 'E';
    case F = 'F';
    case W = 'W';
    case X = 'X';

    public function description(): string
    {
        return match ($this) {
            self::N => 'No information',
            self::A => 'Telegraphy - for aural reception',
            self::B => 'Telegraphy - for automatic reception',
            self::C => 'Facsimile',
            self::D => 'Data, telemetry, telecommand',
            self::E => 'Telephony (including sound broadcasting)',
            self::F => 'Television (video)',
            self::W => 'Combination',
            self::X => 'Not otherwise covered',
        };
    }
}
