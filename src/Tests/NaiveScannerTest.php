<?php

namespace OverlappingRanges\Tests;

use OverlappingRanges\Generator\ArrayRangesGenerator;
use PHPUnit\Framework\TestCase;
use OverlappingRanges\Scanners\NaiveScanner;

class NaiveScannerTest extends TestCase
{
	public function testScanDetectsOverlappingRanges(): void
	{
		$scanner = new NaiveScanner();

		$ranges = ArrayRangesGenerator::generate(5, true);

		$this->expectException(\RuntimeException::class);
		$this->expectExceptionMessage("Overlapping ranges detected.");
		$scanner->scan($ranges);
	}

	public function testScanWithNoOverlappingRanges(): void
	{
		$scanner = new NaiveScanner();

		$ranges = ArrayRangesGenerator::generate(5, false);

		$hasNoOverlaps = $scanner->scan($ranges);
		$this->assertTrue($hasNoOverlaps);
	}
}