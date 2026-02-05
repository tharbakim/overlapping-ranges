<?php

namespace OverlappingRanges\Generator;

class ArrayRangesGenerator
{
	const int MIN_STEP_SIZE = 1;
	const int MAX_STEP_SIZE = 10;

	public static function generate(int $count, bool $overlap = false): array
	{
		$ranges = [];
		$counter = 0;

		if ($overlap) {
			$count--;
		}

		for ($i = 0; $i < $count; $i++) {
			$start = $counter += self::getRandomNumber();
			$end = $counter += self::getRandomNumber();
			$ranges[] = [$start, $end];
		}

		if ($overlap) {
			$pluck = $ranges[array_rand($ranges)];
			$ranges[] = [$pluck[0] - self::getRandomNumber(), $pluck[1] + self::getRandomNumber()];
		} 
		return $ranges;
	}

	private static function getRandomNumber(): int
	{
		return rand(self::MIN_STEP_SIZE, self::MAX_STEP_SIZE);
	}
}