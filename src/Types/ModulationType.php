<?php

namespace Rbarden\RFEmissionDesignator\Types;

/**
 * 47 CFR 2.201(c)
 * @link https://www.ecfr.gov/current/title-47/part-2/subpart-C#p-2.201(c)
 */
enum ModulationType: string
{
    case N = 'N';
    case A = 'A';
    case H = 'H';
    case R = 'R';
    case J = 'J';
    case B = 'B';
    case C = 'C';
    case F = 'F';
    case G = 'G';
    case D = 'D';
    case P = 'P';
    case K = 'K';
    case L = 'L';
    case M = 'M';
    case Q = 'Q';
    case V = 'V';
    case W = 'W';
    case X = 'X';

    public function description(): string
    {
        return match ($this) {
            self::N => 'Unmodulated carrier',
            self::A => 'Amplitude - Double-sideband' ,
            self::H => 'Amplitude - Single-sideband, full carrier' ,
            self::R => 'Amplitude - Single-sideband, reduced/variable level carrier' ,
            self::J => 'Amplitude - Single-sideband, suppressed carrier' ,
            self::B => 'Amplitude - Independent sidebands' ,
            self::C => 'Amplitude - Vestigial sideband' ,
            self::F => 'Frequency',
            self::G => 'Phase',
            self::D => 'Amplitude and angle',
            self::P => 'Unmodulated pulses',
            self::K => 'Pulse - amplitude',
            self::L => 'Pulse - width/duration',
            self::M => 'Pulse - position/phase',
            self::Q => 'Pulse - carrier is angle modulated',
            self::V => 'Pulse - combination',
            self::W => 'Not covered - carrier modulated by two or more: amplitude, angle, pulse',
            self::X => 'Not otherwise covered',
        };
    }
}
