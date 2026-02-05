<?php

namespace OverlappingRanges\Tests;

class ArrayRangesGeneratorTest extends \PHPUnit\Framework\TestCase
{
	public function testGenerateWithoutOverlap(): void
	{
		$ranges = \OverlappingRanges\Generator\ArrayRangesGenerator::generate(5, false);

		$this->assertCount(5, $ranges);
		for ($i = 1; $i < count($ranges); $i++) {
			$this->assertGreaterThan($ranges[$i - 1][1], $ranges[$i][0], "Ranges should not overlap");
		}
	}
}
