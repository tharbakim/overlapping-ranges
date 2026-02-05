<?php

namespace OverlappingRanges\Scanners;

class SortAndSearchScanner implements ScannerInterface
{
	public function scan(array $ranges): true
	{
		usort($ranges, function ($a, $b) {
			return $a[0] <=> $b[0];
		});

		$previousEnd = null;
		foreach ($ranges as $range) {
			if ($previousEnd !== null && $range[0] <= $previousEnd) {
				throw new \RuntimeException("Overlapping ranges detected.");
			}
			$previousEnd = $range[1];
		}

		return true;
	}
}