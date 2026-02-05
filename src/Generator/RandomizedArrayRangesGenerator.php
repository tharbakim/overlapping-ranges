<?php

namespace OverlappingRanges\Generator;

class RandomizedArrayRangesGenerator
{
	public static function generate(int $count, bool $allowOverlap): array
	{
		$ranges = ArrayRangesGenerator::generate($count, $allowOverlap);
		return self::unsortRanges($ranges);
	}

	private static function unsortRanges(array $ranges): array
	{
		shuffle($ranges);
		return $ranges;
	}
}