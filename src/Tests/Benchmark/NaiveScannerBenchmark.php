<?php

namespace OverlappingRanges\Tests\Benchmark;

use OverlappingRanges\Generator\ArrayRangesGenerator;
use OverlappingRanges\Generator\RandomizedArrayRangesGenerator;
use OverlappingRanges\Scanners\NaiveScanner;
use RuntimeException;

class NaiveScannerBenchmark
{
	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithOverlapSmallInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = ArrayRangesGenerator::generate(10, true);

		try {
			$scanner->scan($ranges);
		} catch (RuntimeException) {
			// Expected exception for overlapping ranges
		}
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithOverlapMediumInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = ArrayRangesGenerator::generate(500, true);

		try {
			$scanner->scan($ranges);
		} catch (RuntimeException) {
			// Expected exception for overlapping ranges
		}
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithOverlapLargeInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = ArrayRangesGenerator::generate(1000, true);

		try {
			$scanner->scan($ranges);
		} catch (RuntimeException) {
			// Expected exception for overlapping ranges
		}
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithoutOverlapSmallInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = ArrayRangesGenerator::generate(10, false);

		$scanner->scan($ranges);
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithoutOverlapMediumInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = ArrayRangesGenerator::generate(500, false);

		$scanner->scan($ranges);
	}


	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithoutOverlapLargeInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = ArrayRangesGenerator::generate(1000, false);

		$scanner->scan($ranges);
	}


	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithOverlapSmallInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = RandomizedArrayRangesGenerator::generate(10, true);

		try {
			$scanner->scan($ranges);
		} catch (RuntimeException) {
			// Expected exception for overlapping ranges
		}
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithOverlapMediumInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = RandomizedArrayRangesGenerator::generate(500, true);

		try {
			$scanner->scan($ranges);
		} catch (RuntimeException) {
			// Expected exception for overlapping ranges
		}
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithOverlapLargeInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = RandomizedArrayRangesGenerator::generate(1000, true);

		try {
			$scanner->scan($ranges);
		} catch (RuntimeException) {
			// Expected exception for overlapping ranges
		}
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithoutOverlapSmallInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = RandomizedArrayRangesGenerator::generate(10, false);

		$scanner->scan($ranges);
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithoutOverlapMediumInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = RandomizedArrayRangesGenerator::generate(500, false);

		$scanner->scan($ranges);
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithoutOverlapLargeInput(): void
	{
		$scanner = new NaiveScanner();
		$ranges = RandomizedArrayRangesGenerator::generate(1000, false);

		$scanner->scan($ranges);
	}
}