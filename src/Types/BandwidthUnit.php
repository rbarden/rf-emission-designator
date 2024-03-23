<?php

namespace Rbarden\RFEmissionDesignator\Types;

/**
 * 47 CFR 2.202(b)(2)
 * @link https://www.ecfr.gov/current/title-47/part-2/subpart-C#p-2.202(b)(2)
 */
enum BandwidthUnit: string
{
    case Hz = 'H';
    case kHz = 'K';
    case MHz = 'M';
    case GHz = 'G';
}
