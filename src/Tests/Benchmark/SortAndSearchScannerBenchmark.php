<?php

namespace OverlappingRanges\Tests\Benchmark;

use OverlappingRanges\Generator\ArrayRangesGenerator;
use OverlappingRanges\Scanners\SortAndSearchScanner;
use RuntimeException;

class SortAndSearchScannerBenchmark
{
	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithOverlapSmallInput(): void
	{
		$scanner = new SortAndSearchScanner();
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
		$scanner = new SortAndSearchScanner();
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
		$scanner = new SortAndSearchScanner();
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
		$scanner = new SortAndSearchScanner();
		$ranges = ArrayRangesGenerator::generate(10, false);

		$scanner->scan($ranges);
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithoutOverlapMediumInput(): void
	{
		$scanner = new SortAndSearchScanner();
		$ranges = ArrayRangesGenerator::generate(500, false);

		$scanner->scan($ranges);
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanWithoutOverlapLargeInput(): void
	{
		$scanner = new SortAndSearchScanner();
		$ranges = ArrayRangesGenerator::generate(1000, false);

		$scanner->scan($ranges);
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithOverlapSmallInput(): void
	{
		$scanner = new SortAndSearchScanner();
		$ranges = \OverlappingRanges\Generator\RandomizedArrayRangesGenerator::generate(10, true);

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
		$scanner = new SortAndSearchScanner();
		$ranges = \OverlappingRanges\Generator\RandomizedArrayRangesGenerator::generate(500, true);

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
		$scanner = new SortAndSearchScanner();
		$ranges = \OverlappingRanges\Generator\RandomizedArrayRangesGenerator::generate(1000, true);

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
		$scanner = new SortAndSearchScanner();
		$ranges = \OverlappingRanges\Generator\RandomizedArrayRangesGenerator::generate(10, false);

		$scanner->scan($ranges);
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithoutOverlapMediumInput(): void
	{
		$scanner = new SortAndSearchScanner();
		$ranges = \OverlappingRanges\Generator\RandomizedArrayRangesGenerator::generate(500, false);

		$scanner->scan($ranges);
	}

	/**
	 * @Revs(1000)
	 * @Iterations(10)
	 */
	public function benchScanRandomizedRangesWithoutOverlapLargeInput(): void
	{
		$scanner = new SortAndSearchScanner();
		$ranges = \OverlappingRanges\Generator\RandomizedArrayRangesGenerator::generate(1000, false);

		$scanner->scan($ranges);
	}
}