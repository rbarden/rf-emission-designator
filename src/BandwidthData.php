<?php

namespace Rbarden\RFEmissionDesignator;

use Rbarden\RFEmissionDesignator\Types\BandwidthUnit;

final readonly class BandwidthData
{
    public function __construct(
        public string        $scalar,
        public BandwidthUnit $unit,
    )
    {}

    public static function from($designator): BandwidthData
    {
        $result = '';
        $unit = null;

        $foundLetter = false;
        $foundDigitsCount = 0;

        foreach (str_split($designator) as $index => $letter) {
            if (
                (!in_array($letter, [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'H', 'K', 'M', 'G']))
                || (($index === 0) && in_array($letter, [0, 'K', 'M', 'G']))
            ) {
                throw new \InvalidArgumentException("Invalid character [$letter] at position [$index]");
            }

            if (in_array($letter, ['H', 'K', 'M', 'G'])) {
                if ($foundLetter) {
                    throw new \InvalidArgumentException("Invalid character [$letter] at position [$index]");
                }

                $result .= '.';
                $unit = BandwidthUnit::tryFrom($letter);
                $foundLetter = true;
            } else {
                if ($foundDigitsCount >= 3) {
                    throw new \InvalidArgumentException("Invalid character [$letter] at position [$index]");
                }

                $foundDigitsCount++;
                $result .= $letter;
            }
        }

        return new self($result, $unit);
    }
}