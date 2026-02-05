<?php

namespace OverlappingRanges\Scanners;

use RuntimeException;

class SingleSortAndSearchLoop
{
	public static function scan(array $ranges): bool
	{
		$sortedRanges = [];
		foreach ($ranges as $range) {
			self::insertAndCheckOverlap($sortedRanges, $range);
		}

		return true;
	}

	private static function insertAndCheckOverlap(array &$sortedRanges, array $newRange): void
	{
		$position = self::findSplicePosition($sortedRanges, $newRange);
		self::checkForOverlappingNeighbours($sortedRanges, $position, $newRange);
		$sortedRanges = array_merge(
			array_slice($sortedRanges, 0, $position),
			[$newRange],
			array_slice($sortedRanges, $position)
		);
	}		

	private static function findSplicePosition(array &$sortedRanges, array $newRange): int
	{
		$low = 0;
		$high = count($sortedRanges);

		while ($low < $high) {
			$mid = intdiv($low + $high, 2);
			if ($sortedRanges[$mid][0] < $newRange[0]) {
				$low = $mid + 1;
			} else {
				$high = $mid;
			}
		}
		return $low;
	}

	private static function checkForOverlappingNeighbours(array $sortedRanges, int $position, array $newRange): void
	{
		if ($position > 0) {
			$leftNeighbor = $sortedRanges[$position - 1];
			if (self::rangesOverlap($leftNeighbor, $newRange)) {
				throw new RuntimeException("Overlapping ranges detected.");
			}
		}

		if ($position < count($sortedRanges)) {
			$rightNeighbor = $sortedRanges[$position];
			if (self::rangesOverlap($rightNeighbor, $newRange)) {
				throw new RuntimeException("Overlapping ranges detected.");
			}
		}
	}

	private static function rangesOverlap(array $range1, array $range2): bool
	{
		return $range1[0] <= $range2[1] && $range2[0] <= $range1[1];
	}
}