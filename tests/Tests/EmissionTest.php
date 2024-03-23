<?php

namespace Rbarden\RFEmissionDesignator\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Rbarden\RFEmissionDesignator\EmissionDesignator;
use Rbarden\RFEmissionDesignator\Types\CarrierType;
use Rbarden\RFEmissionDesignator\Types\InformationType;
use Rbarden\RFEmissionDesignator\Types\ModulationType;

class EmissionTest extends TestCase
{
    #[Test]
    public function it_parses_a_three_character_designator()
    {
        $toTest = 'A1A';

        $designator = EmissionDesignator::from($toTest);

        $this->assertEquals($toTest, $designator->fullDesignator);
        $this->assertEquals(ModulationType::A, $designator->characteristicData->modulation);
        $this->assertEquals(CarrierType::One, $designator->characteristicData->carrier);
        $this->assertEquals(InformationType::A, $designator->characteristicData->information);
    }

    #[Test]
    public function it_throws_on_unknown_modulation()
    {
        $this->expectException(\TypeError::class);
        EmissionDesignator::from('E1A');
    }

    #[Test]
    public function it_throws_on_unknown_carrier()
    {
        $this->expectException(\TypeError::class);
        EmissionDesignator::from('A4A');
    }

    #[Test]
    public function it_throws_on_unknown_information()
    {
        $this->expectException(\TypeError::class);
        EmissionDesignator::from('A1G');
    }

    #[Test]
    public function it_throws_on_incorrect_designator_length()
    {
        $this->expectException(\InvalidArgumentException::class);
        EmissionDesignator::from('A');
    }
}