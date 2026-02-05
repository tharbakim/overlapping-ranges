<?php

namespace OverlappingRanges\Tests\Benchmark;

use OverlappingRanges\Generator\RandomizedArrayRangesGenerator;

class RandomizedArrayGeneratorBenchmark
{
	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateSmallWithOverlap(): void
	{
		RandomizedArrayRangesGenerator::generate(10, true);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateMediumWithOverlap(): void
	{
		RandomizedArrayRangesGenerator::generate(500, true);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateLargeWithOverlap(): void
	{
		RandomizedArrayRangesGenerator::generate(1000, true);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateSmallWithoutOverlap(): void
	{
		RandomizedArrayRangesGenerator::generate(10, false);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateMediumWithoutOverlap(): void
	{
		RandomizedArrayRangesGenerator::generate(500, false);
	}

	/**
	 * @Revs(100)
	 * @Iterations(10)
	 */
	public function benchGenerateLargeWithoutOverlap(): void
	{
		RandomizedArrayRangesGenerator::generate(1000, false);
	}
}