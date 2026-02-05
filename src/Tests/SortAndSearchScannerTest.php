<?php

namespace OverlappingRanges\Tests;

use OverlappingRanges\Generator\ArrayRangesGenerator;

class SortAndSearchScannerTest extends \PHPUnit\Framework\TestCase
{
	public function testScanWithOverlap(): void
	{
		$scanner = new \OverlappingRanges\Scanners\SortAndSearchScanner();
		$ranges = ArrayRangesGenerator::generate(5, true);

		$this->expectException(\RuntimeException::class);
		$scanner->scan($ranges);
	}

	public function testScanWithoutOverlap(): void
	{
		$scanner = new \OverlappingRanges\Scanners\SortAndSearchScanner();
		$ranges = ArrayRangesGenerator::generate(5, false);

		$result = $scanner->scan($ranges);
		$this->assertTrue($result);
	}
}