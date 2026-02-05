<?php

namespace OverlappingRanges\Tests;

use OverlappingRanges\Generator\ArrayRangesGenerator;
use OverlappingRanges\Scanners\SingleSortAndSearchLoop;
use PHPUnit\Framework\TestCase;

class SingleSortAndSearchLoopTest extends TestCase
{
	public function testScanWithOverlap(): void
	{
		$scanner = new SingleSortAndSearchLoop();
		$ranges = ArrayRangesGenerator::generate(5, true);

		$this->expectException(\RuntimeException::class);
		$scanner->scan($ranges);
	}

	public function testScanWithoutOverlap(): void
	{
		$scanner = new \OverlappingRanges\Scanners\SingleSortAndSearchLoop();
		$ranges = ArrayRangesGenerator::generate(5, false);

		$result = $scanner->scan($ranges);
		$this->assertTrue($result);
	}
}
