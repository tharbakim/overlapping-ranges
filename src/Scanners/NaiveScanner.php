<?php

namespace OverlappingRanges\Scanners;

class NaiveScanner implements ScannerInterface
{
	public function scan(array $ranges): true
	{
		$count = count($ranges);
		for ($i = 0; $i < $count; $i++) {
			for ($j = $i + 1; $j < $count; $j++) {
				if ($this->rangesOverlap($ranges[$i], $ranges[$j])) {
					throw new \RuntimeException("Overlapping ranges detected.");
				}
			}
		}

		return true;
	}

	private function rangesOverlap(array $range1, array $range2): bool
	{
		return $range1[0] <= $range2[1] && $range2[0] <= $range1[1];
	}
}