<?php

namespace OverlappingRanges\Tests\Benchmark;

use OverlappingRanges\Generator\ArrayRangesGenerator;

class ArrayRangesGeneratorBenchmark
{
	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateSmallWithOverlap(): void
	{
		ArrayRangesGenerator::generate(10, true);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateMediumWithOverlap(): void
	{
		ArrayRangesGenerator::generate(500, true);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateLargeWithOverlap(): void
	{
		ArrayRangesGenerator::generate(1000, true);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateSmallWithoutOverlap(): void
	{
		ArrayRangesGenerator::generate(10, false);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateMediumWithoutOverlap(): void
	{
		ArrayRangesGenerator::generate(500, false);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateLargeWithoutOverlap(): void
	{
		ArrayRangesGenerator::generate(1000, false);
	}
}