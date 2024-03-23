<?php

namespace Rbarden\RFEmissionDesignator\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Rbarden\RFEmissionDesignator\EmissionDesignator;
use Rbarden\RFEmissionDesignator\Types\BandwidthUnit;
use Rbarden\RFEmissionDesignator\Types\CarrierType;
use Rbarden\RFEmissionDesignator\Types\InformationType;
use Rbarden\RFEmissionDesignator\Types\ModulationType;

class BandwidthTest extends TestCase
{
    #[Test]
    public function it_parses_a_seven_character_designator()
    {
        $toTest = '11K5A1A';

        $designator = EmissionDesignator::from($toTest);

        $this->assertEquals($toTest, $designator->fullDesignator);
        $this->assertEquals(ModulationType::A, $designator->characteristicData->modulation);
        $this->assertEquals(CarrierType::One, $designator->characteristicData->carrier);
        $this->assertEquals(InformationType::A, $designator->characteristicData->information);

        $this->assertEquals('11.5', $designator->bandwidth->scalar);
        $this->assertEquals(BandwidthUnit::kHz, $designator->bandwidth->unit);
    }

    #[Test]
    public function it_throws_on_invalid_first_character()
    {
        $this->expectExceptionMessage('Invalid character [0] at position [0]');
        EmissionDesignator::from('011KA1A');
    }

    #[Test]
    public function it_throws_on_invalid_any_character()
    {
        $this->expectExceptionMessage('Invalid character [L] at position [2]');
        EmissionDesignator::from('11L1A1A');
    }

    #[Test]
    public function it_throws_on_invalid_double_letter()
    {
        $this->expectExceptionMessage('Invalid character [K] at position [3]');
        EmissionDesignator::from('11KKA1A');
    }

    #[Test]
    public function it_throws_on_invalid_all_numbers()
    {
        $this->expectExceptionMessage('Invalid character [2] at position [3]');
        EmissionDesignator::from('1112A1A');
    }
}
