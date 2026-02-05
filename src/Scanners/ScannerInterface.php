<?php

namespace OverlappingRanges\Scanners;

interface ScannerInterface
{
	public function scan(array $ranges): true;
}