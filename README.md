# RF Emission Designators

RF Emission Designators describe characteristics of RF signals.

This package uses the definitions found in [47 CFR Part 2 Subpart C](https://www.ecfr.gov/current/title-47/part-2/subpart-C).

This means that only 3- and 7-character designators are supported, for example: `J3E` and `2K80J3E`

**N.B.** This package doesn't really have any practical application right now.

## Usage

Parse the string with `Rbarden\RFEmissionDesignator\EmissionDesignator::from($designator)` and then you can access all the properties from there.

See the tests.