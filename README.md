# Introduction
This repository is the source code from this blog post: [Technical Challenge: Checking For Overlap in a Series of Ranges](https://tharba.kim/technical-challenge-checking-for-overlap-in-a-series-of-ranges/)

In which 3 different methods of checking for overlap in a series of ranges are detailed and compared.

# Benchmark

The results of benchmarking the 3 methods on a Macbook Air (M2) 24GB RAM on macOS Tahoe 26.2 using PHP 8.5.1:

## Summary
```
\OverlappingRanges\Tests\Benchmark\NaiveScannerBenchmark

    benchScanWithOverlapSmallInput..........I9 - Mo2.626μs (±7.62%)
    benchScanWithOverlapMediumInput.........I9 - Mo2.854ms (±1.80%)
    benchScanWithOverlapLargeInput..........I9 - Mo11.677ms (±1.77%)
    benchScanWithoutOverlapSmallInput.......I9 - Mo3.017μs (±4.21%)
    benchScanWithoutOverlapMediumInput......I9 - Mo4.284ms (±1.52%)
    benchScanWithoutOverlapLargeInput.......I9 - Mo17.681ms (±1.23%)
    benchScanRandomizedRangesWithOverlapSma.I9 - Mo2.411μs (±6.71%)
    benchScanRandomizedRangesWithOverlapMed.I9 - Mo1.749ms (±2.99%)
    benchScanRandomizedRangesWithOverlapLar.I9 - Mo7.393ms (±1.59%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo3.281μs (±3.91%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo4.385ms (±2.09%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo18.249ms (±0.69%)

\OverlappingRanges\Tests\Benchmark\ArrayRangesGeneratorBenchmark

    benchGenerateSmallWithOverlap...........I9 - Mo1.609μs (±36.13%)
    benchGenerateMediumWithOverlap..........I9 - Mo44.905μs (±4.83%)
    benchGenerateLargeWithOverlap...........I9 - Mo89.598μs (±3.01%)
    benchGenerateSmallWithoutOverlap........I9 - Mo1.520μs (±2.89%)
    benchGenerateMediumWithoutOverlap.......I9 - Mo44.569μs (±0.71%)
    benchGenerateLargeWithoutOverlap........I9 - Mo89.181μs (±1.19%)

\OverlappingRanges\Tests\Benchmark\SingleSortAndSearchLoopBenchmark

    benchScanWithOverlapSmallInput..........I9 - Mo4.491μs (±18.47%)
    benchScanWithOverlapMediumInput.........I9 - Mo624.893μs (±1.34%)
    benchScanWithOverlapLargeInput..........I9 - Mo2.041ms (±1.94%)
    benchScanWithoutOverlapSmallInput.......I9 - Mo4.182μs (±0.53%)
    benchScanWithoutOverlapMediumInput......I9 - Mo628.859μs (±1.26%)
    benchScanWithoutOverlapLargeInput.......I9 - Mo2.039ms (±0.70%)
    benchScanRandomizedRangesWithOverlapSma.I9 - Mo3.937μs (±4.29%)
    benchScanRandomizedRangesWithOverlapMed.I9 - Mo435.204μs (±1.74%)
    benchScanRandomizedRangesWithOverlapLar.I9 - Mo1.356ms (±1.84%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo5.044μs (±1.54%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo886.950μs (±2.75%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo2.974ms (±0.86%)

\OverlappingRanges\Tests\Benchmark\RandomizedArrayGeneratorBenchmark

    benchGenerateSmallWithOverlap...........I9 - Mo2.360μs (±3.53%)
    benchGenerateMediumWithOverlap..........I9 - Mo52.475μs (±2.03%)
    benchGenerateLargeWithOverlap...........I9 - Mo102.120μs (±2.08%)
    benchGenerateSmallWithoutOverlap........I9 - Mo2.119μs (±0.87%)
    benchGenerateMediumWithoutOverlap.......I9 - Mo50.238μs (±0.90%)
    benchGenerateLargeWithoutOverlap........I9 - Mo102.141μs (±0.70%)

\OverlappingRanges\Tests\Benchmark\SortAndSearchScannerBenchmark

    benchScanWithOverlapSmallInput..........I9 - Mo2.098μs (±12.28%)
    benchScanWithOverlapMediumInput.........I9 - Mo152.580μs (±0.95%)
    benchScanWithOverlapLargeInput..........I9 - Mo340.161μs (±1.16%)
    benchScanWithoutOverlapSmallInput.......I9 - Mo1.805μs (±1.44%)
    benchScanWithoutOverlapMediumInput......I9 - Mo133.652μs (±2.94%)
    benchScanWithoutOverlapLargeInput.......I9 - Mo293.179μs (±4.79%)
    benchScanRandomizedRangesWithOverlapSma.I9 - Mo2.776μs (±26.44%)
    benchScanRandomizedRangesWithOverlapMed.I9 - Mo188.538μs (±0.73%)
    benchScanRandomizedRangesWithOverlapLar.I9 - Mo414.631μs (±18.51%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo2.627μs (±3.07%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo191.860μs (±0.60%)
    benchScanRandomizedRangesWithoutOverlap.I9 - Mo425.321μs (±1.62%)
	```

## Details
	```
	Subjects: 48, Assertions: 0, Failures: 0, Errors: 0
+------+-----------------------------------+----------------------------------------------------+-----+------+------------+--------------+--------------+----------------+
| iter | benchmark                         | subject                                            | set | revs | mem_peak   | time_avg     | comp_z_value | comp_deviation |
+------+-----------------------------------+----------------------------------------------------+-----+------+------------+--------------+--------------+----------------+
| 0    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 3.304μs      | +2.97σ       | +22.66%        |
| 1    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.652μs      | -0.20σ       | -1.54%         |
| 2    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.585μs      | -0.53σ       | -4.03%         |
| 3    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.630μs      | -0.31σ       | -2.36%         |
| 4    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.634μs      | -0.29σ       | -2.21%         |
| 5    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.609μs      | -0.41σ       | -3.14%         |
| 6    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.676μs      | -0.09σ       | -0.65%         |
| 7    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.585μs      | -0.53σ       | -4.03%         |
| 8    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.615μs      | -0.38σ       | -2.92%         |
| 9    | NaiveScannerBenchmark             | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,432b | 2.646μs      | -0.23σ       | -1.77%         |
| 0    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,852.887μs  | -0.51σ       | -0.91%         |
| 1    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,895.549μs  | +0.32σ       | +0.57%         |
| 2    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,907.991μs  | +0.56σ       | +1.00%         |
| 3    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,952.739μs  | +1.42σ       | +2.56%         |
| 4    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,846.000μs  | -0.64σ       | -1.15%         |
| 5    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,813.048μs  | -1.28σ       | -2.29%         |
| 6    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,869.123μs  | -0.19σ       | -0.35%         |
| 7    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,979.128μs  | +1.93σ       | +3.48%         |
| 8    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,821.336μs  | -1.11σ       | -2.01%         |
| 9    | NaiveScannerBenchmark             | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,432b | 2,852.821μs  | -0.51σ       | -0.91%         |
| 0    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,194.459μs | -2.26σ       | -4.01%         |
| 1    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 12,011.568μs | +1.69σ       | +3.00%         |
| 2    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,687.683μs | +0.12σ       | +0.22%         |
| 3    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,734.255μs | +0.35σ       | +0.62%         |
| 4    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,561.621μs | -0.49σ       | -0.86%         |
| 5    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,547.883μs | -0.55σ       | -0.98%         |
| 6    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,569.054μs | -0.45σ       | -0.80%         |
| 7    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,864.252μs | +0.98σ       | +1.73%         |
| 8    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,735.327μs | +0.35σ       | +0.63%         |
| 9    | NaiveScannerBenchmark             | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,432b | 11,715.083μs | +0.26σ       | +0.45%         |
| 0    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 3.319μs      | +1.80σ       | +7.60%         |
| 1    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 2.985μs      | -0.77σ       | -3.23%         |
| 2    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 2.997μs      | -0.67σ       | -2.84%         |
| 3    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 3.007μs      | -0.60σ       | -2.52%         |
| 4    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 3.037μs      | -0.37σ       | -1.54%         |
| 5    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 3.011μs      | -0.57σ       | -2.39%         |
| 6    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 3.111μs      | +0.20σ       | +0.86%         |
| 7    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 3.021μs      | -0.49σ       | -2.06%         |
| 8    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 3.006μs      | -0.61σ       | -2.55%         |
| 9    | NaiveScannerBenchmark             | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,448b | 3.352μs      | +2.06σ       | +8.67%         |
| 0    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,307.644μs  | -0.06σ       | -0.10%         |
| 1    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,286.141μs  | -0.39σ       | -0.60%         |
| 2    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,257.060μs  | -0.84σ       | -1.27%         |
| 3    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,250.310μs  | -0.94σ       | -1.43%         |
| 4    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,276.339μs  | -0.54σ       | -0.82%         |
| 5    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,477.186μs  | +2.53σ       | +3.83%         |
| 6    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,314.476μs  | +0.04σ       | +0.06%         |
| 7    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,381.973μs  | +1.07σ       | +1.63%         |
| 8    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,293.238μs  | -0.28σ       | -0.43%         |
| 9    | NaiveScannerBenchmark             | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,448b | 4,274.280μs  | -0.57σ       | -0.87%         |
| 0    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,490.402μs | -0.85σ       | -1.05%         |
| 1    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,600.574μs | -0.34σ       | -0.42%         |
| 2    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,800.364μs | +0.57σ       | +0.71%         |
| 3    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,644.114μs | -0.14σ       | -0.18%         |
| 4    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,916.920μs | +1.11σ       | +1.37%         |
| 5    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 18,021.763μs | +1.59σ       | +1.96%         |
| 6    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,219.316μs | -2.10σ       | -2.58%         |
| 7    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,699.820μs | +0.11σ       | +0.14%         |
| 8    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,558.418μs | -0.54σ       | -0.66%         |
| 9    | NaiveScannerBenchmark             | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,448b | 17,801.661μs | +0.58σ       | +0.71%         |
| 0    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.956μs      | +2.96σ       | +19.87%        |
| 1    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.388μs      | -0.47σ       | -3.17%         |
| 2    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.443μs      | -0.14σ       | -0.94%         |
| 3    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.400μs      | -0.40σ       | -2.68%         |
| 4    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.393μs      | -0.44σ       | -2.96%         |
| 5    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.449μs      | -0.10σ       | -0.69%         |
| 6    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.457μs      | -0.06σ       | -0.37%         |
| 7    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.399μs      | -0.41σ       | -2.72%         |
| 8    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.382μs      | -0.51σ       | -3.41%         |
| 9    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,480b | 2.394μs      | -0.44σ       | -2.92%         |
| 0    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,821.572μs  | +0.96σ       | +2.86%         |
| 1    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,794.600μs  | +0.45σ       | +1.34%         |
| 2    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,746.602μs  | -0.46σ       | -1.37%         |
| 3    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,719.558μs  | -0.97σ       | -2.90%         |
| 4    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,743.067μs  | -0.53σ       | -1.57%         |
| 5    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,700.189μs  | -1.34σ       | -3.99%         |
| 6    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,880.913μs  | +2.08σ       | +6.21%         |
| 7    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,717.761μs  | -1.00σ       | -3.00%         |
| 8    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,791.476μs  | +0.39σ       | +1.16%         |
| 9    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,480b | 1,793.503μs  | +0.43σ       | +1.27%         |
| 0    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,467.756μs  | +1.08σ       | +1.72%         |
| 1    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,420.185μs  | +0.67σ       | +1.07%         |
| 2    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,263.524μs  | -0.67σ       | -1.07%         |
| 3    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,501.863μs  | +1.37σ       | +2.18%         |
| 4    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,323.092μs  | -0.16σ       | -0.26%         |
| 5    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,370.504μs  | +0.25σ       | +0.39%         |
| 6    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,387.367μs  | +0.39σ       | +0.62%         |
| 7    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,389.511μs  | +0.41σ       | +0.65%         |
| 8    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,165.110μs  | -1.52σ       | -2.41%         |
| 9    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,480b | 7,129.293μs  | -1.82σ       | -2.89%         |
| 0    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.291μs      | -0.30σ       | -1.17%         |
| 1    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.321μs      | -0.07σ       | -0.27%         |
| 2    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.292μs      | -0.29σ       | -1.14%         |
| 3    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.262μs      | -0.52σ       | -2.04%         |
| 4    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.700μs      | +2.84σ       | +11.11%        |
| 5    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.265μs      | -0.50σ       | -1.95%         |
| 6    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.252μs      | -0.60σ       | -2.34%         |
| 7    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.257μs      | -0.56σ       | -2.19%         |
| 8    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.262μs      | -0.52σ       | -2.04%         |
| 9    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,480b | 3.398μs      | +0.52σ       | +2.04%         |
| 0    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,407.742μs  | -0.13σ       | -0.27%         |
| 1    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,385.385μs  | -0.37σ       | -0.77%         |
| 2    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,662.691μs  | +2.64σ       | +5.50%         |
| 3    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,498.721μs  | +0.86σ       | +1.79%         |
| 4    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,369.920μs  | -0.54σ       | -1.12%         |
| 5    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,399.330μs  | -0.22σ       | -0.46%         |
| 6    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,321.172μs  | -1.07σ       | -2.22%         |
| 7    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,411.168μs  | -0.09σ       | -0.19%         |
| 8    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,349.380μs  | -0.76σ       | -1.59%         |
| 9    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,480b | 4,389.432μs  | -0.33σ       | -0.68%         |
| 0    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,318.874μs | +0.39σ       | +0.27%         |
| 1    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,256.941μs | -0.10σ       | -0.07%         |
| 2    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,571.186μs | +2.39σ       | +1.65%         |
| 3    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,119.657μs | -1.18σ       | -0.82%         |
| 4    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,310.828μs | +0.33σ       | +0.23%         |
| 5    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,352.377μs | +0.66σ       | +0.46%         |
| 6    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,214.318μs | -0.43σ       | -0.30%         |
| 7    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,111.694μs | -1.24σ       | -0.86%         |
| 8    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,251.701μs | -0.14σ       | -0.10%         |
| 9    | NaiveScannerBenchmark             | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,480b | 18,183.849μs | -0.67σ       | -0.47%         |
| 0    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 3.810μs      | +2.99σ       | +108.08%       |
| 1    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.640μs      | -0.29σ       | -10.43%        |
| 2    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.590μs      | -0.36σ       | -13.16%        |
| 3    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.580μs      | -0.38σ       | -13.71%        |
| 4    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.670μs      | -0.24σ       | -8.79%         |
| 5    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.730μs      | -0.15σ       | -5.52%         |
| 6    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.580μs      | -0.38σ       | -13.71%        |
| 7    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.570μs      | -0.39σ       | -14.25%        |
| 8    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.570μs      | -0.39σ       | -14.25%        |
| 9    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 1.570μs      | -0.39σ       | -14.25%        |
| 0    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 44.180μs     | -0.82σ       | -3.94%         |
| 1    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 44.750μs     | -0.56σ       | -2.70%         |
| 2    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 45.360μs     | -0.28σ       | -1.37%         |
| 3    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 50.120μs     | +1.86σ       | +8.98%         |
| 4    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 50.400μs     | +1.98σ       | +9.58%         |
| 5    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 44.160μs     | -0.82σ       | -3.98%         |
| 6    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 46.010μs     | +0.01σ       | +0.04%         |
| 7    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 44.260μs     | -0.78σ       | -3.77%         |
| 8    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 44.880μs     | -0.50σ       | -2.42%         |
| 9    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 45.800μs     | -0.09σ       | -0.42%         |
| 0    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 89.790μs     | -0.50σ       | -1.51%         |
| 1    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 94.260μs     | +1.13σ       | +3.39%         |
| 2    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 89.420μs     | -0.64σ       | -1.92%         |
| 3    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 89.460μs     | -0.62σ       | -1.87%         |
| 4    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 89.150μs     | -0.74σ       | -2.21%         |
| 5    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 97.260μs     | +2.22σ       | +6.68%         |
| 6    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 88.280μs     | -1.05σ       | -3.17%         |
| 7    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 89.720μs     | -0.53σ       | -1.59%         |
| 8    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 90.730μs     | -0.16σ       | -0.48%         |
| 9    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 93.590μs     | +0.88σ       | +2.66%         |
| 0    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.520μs      | -0.60σ       | -1.75%         |
| 1    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.500μs      | -1.05σ       | -3.04%         |
| 2    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.550μs      | +0.07σ       | +0.19%         |
| 3    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.630μs      | +1.86σ       | +5.37%         |
| 4    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.610μs      | +1.41σ       | +4.07%         |
| 5    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.500μs      | -1.05σ       | -3.04%         |
| 6    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.540μs      | -0.16σ       | -0.45%         |
| 7    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.510μs      | -0.83σ       | -2.39%         |
| 8    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.520μs      | -0.60σ       | -1.75%         |
| 9    | ArrayRangesGeneratorBenchmark     | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 1.590μs      | +0.96σ       | +2.78%         |
| 0    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 43.960μs     | -1.15σ       | -0.81%         |
| 1    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 43.850μs     | -1.50σ       | -1.06%         |
| 2    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 44.180μs     | -0.44σ       | -0.31%         |
| 3    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 44.000μs     | -1.02σ       | -0.72%         |
| 4    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 44.140μs     | -0.57σ       | -0.40%         |
| 5    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 44.480μs     | +0.51σ       | +0.36%         |
| 6    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 44.530μs     | +0.67σ       | +0.48%         |
| 7    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 44.670μs     | +1.12σ       | +0.79%         |
| 8    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 44.760μs     | +1.41σ       | +1.00%         |
| 9    | ArrayRangesGeneratorBenchmark     | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 44.620μs     | +0.96σ       | +0.68%         |
| 0    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 88.960μs     | +0.08σ       | +0.10%         |
| 1    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 90.190μs     | +1.25σ       | +1.48%         |
| 2    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 89.590μs     | +0.68σ       | +0.80%         |
| 3    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 90.120μs     | +1.18σ       | +1.40%         |
| 4    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 89.080μs     | +0.19σ       | +0.23%         |
| 5    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 87.850μs     | -0.97σ       | -1.15%         |
| 6    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 88.880μs     | +0.00σ       | +0.01%         |
| 7    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 86.480μs     | -2.27σ       | -2.69%         |
| 8    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 88.300μs     | -0.54σ       | -0.65%         |
| 9    | ArrayRangesGeneratorBenchmark     | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 89.300μs     | +0.40σ       | +0.48%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 7.431μs      | +2.99σ       | +55.30%        |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.494μs      | -0.33σ       | -6.08%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.641μs      | -0.16σ       | -3.01%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.482μs      | -0.34σ       | -6.33%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.464μs      | -0.36σ       | -6.71%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.465μs      | -0.36σ       | -6.69%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.432μs      | -0.40σ       | -7.38%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.477μs      | -0.35σ       | -6.44%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.505μs      | -0.32σ       | -5.85%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 4.459μs      | -0.37σ       | -6.81%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 626.533μs    | -0.14σ       | -0.18%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 623.510μs    | -0.49σ       | -0.66%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 623.701μs    | -0.47σ       | -0.63%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 627.562μs    | -0.01σ       | -0.02%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 625.592μs    | -0.25σ       | -0.33%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 622.504μs    | -0.61σ       | -0.82%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 625.047μs    | -0.31σ       | -0.42%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 622.239μs    | -0.64σ       | -0.87%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 652.381μs    | +2.93σ       | +3.94%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 627.708μs    | +0.00σ       | +0.00%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,041.375μs  | -0.39σ       | -0.75%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,082.638μs  | +0.65σ       | +1.25%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,036.801μs  | -0.50σ       | -0.98%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,029.856μs  | -0.68σ       | -1.31%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,167.474μs  | +2.77σ       | +5.38%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,058.212μs  | +0.03σ       | +0.06%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,028.635μs  | -0.71σ       | -1.37%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,048.660μs  | -0.21σ       | -0.40%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,034.047μs  | -0.57σ       | -1.11%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 2,041.093μs  | -0.40σ       | -0.77%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.202μs      | +0.95σ       | +0.51%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.199μs      | +0.82σ       | +0.44%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.178μs      | -0.13σ       | -0.07%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.186μs      | +0.23σ       | +0.12%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.220μs      | +1.76σ       | +0.94%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.161μs      | -0.89σ       | -0.47%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.176μs      | -0.22σ       | -0.11%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.186μs      | +0.23σ       | +0.12%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.138μs      | -1.92σ       | -1.02%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 4.162μs      | -0.84σ       | -0.45%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 627.895μs    | -0.88σ       | -1.11%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 647.587μs    | +1.58σ       | +1.99%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 640.928μs    | +0.74σ       | +0.94%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 629.366μs    | -0.70σ       | -0.88%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 627.788μs    | -0.90σ       | -1.13%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 626.178μs    | -1.10σ       | -1.38%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 633.040μs    | -0.24σ       | -0.30%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 646.072μs    | +1.39σ       | +1.75%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 642.781μs    | +0.98σ       | +1.23%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 628.080μs    | -0.86σ       | -1.09%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,040.281μs  | -0.54σ       | -0.38%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,068.466μs  | +1.43σ       | +1.00%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,041.630μs  | -0.45σ       | -0.31%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,036.546μs  | -0.81σ       | -0.56%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,067.710μs  | +1.38σ       | +0.96%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,041.007μs  | -0.49σ       | -0.34%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,034.768μs  | -0.93σ       | -0.65%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,033.681μs  | -1.01σ       | -0.70%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,071.753μs  | +1.66σ       | +1.16%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 2,044.722μs  | -0.23σ       | -0.16%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 4.471μs      | +2.78σ       | +11.91%        |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 3.914μs      | -0.47σ       | -2.03%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 3.981μs      | -0.08σ       | -0.35%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 3.839μs      | -0.91σ       | -3.90%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 3.957μs      | -0.22σ       | -0.95%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 3.888μs      | -0.62σ       | -2.68%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 4.076μs      | +0.47σ       | +2.03%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 3.929μs      | -0.39σ       | -1.65%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 4.010μs      | +0.09σ       | +0.38%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 3.885μs      | -0.64σ       | -2.75%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 441.055μs    | +0.53σ       | +0.93%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 451.216μs    | +1.87σ       | +3.26%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 426.271μs    | -1.41σ       | -2.45%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 429.003μs    | -1.05σ       | -1.83%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 429.111μs    | -1.03σ       | -1.80%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 439.033μs    | +0.27σ       | +0.47%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 435.046μs    | -0.25σ       | -0.44%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 440.050μs    | +0.40σ       | +0.70%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 446.238μs    | +1.22σ       | +2.12%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 432.790μs    | -0.55σ       | -0.96%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,346.174μs  | -0.95σ       | -1.75%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,374.343μs  | +0.17σ       | +0.31%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,377.823μs  | +0.31σ       | +0.56%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,401.347μs  | +1.24σ       | +2.28%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,409.932μs  | +1.58σ       | +2.91%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,394.440μs  | +0.97σ       | +1.78%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,346.778μs  | -0.92σ       | -1.70%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,372.092μs  | +0.08σ       | +0.15%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,345.175μs  | -0.99σ       | -1.82%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 1,332.777μs  | -1.48σ       | -2.72%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.022μs      | -0.85σ       | -1.32%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.242μs      | +1.95σ       | +3.00%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.084μs      | -0.06σ       | -0.10%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.146μs      | +0.72σ       | +1.12%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 4.999μs      | -1.15σ       | -1.77%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.062μs      | -0.35σ       | -0.53%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.013μs      | -0.97σ       | -1.50%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.105μs      | +0.20σ       | +0.31%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.023μs      | -0.84σ       | -1.30%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 5.195μs      | +1.35σ       | +2.08%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 967.447μs    | +2.92σ       | +8.04%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 881.572μs    | -0.56σ       | -1.55%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 889.394μs    | -0.25σ       | -0.68%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 883.002μs    | -0.51σ       | -1.39%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 883.473μs    | -0.49σ       | -1.34%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 890.405μs    | -0.21σ       | -0.57%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 883.631μs    | -0.48σ       | -1.32%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 889.219μs    | -0.25σ       | -0.70%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 885.057μs    | -0.42σ       | -1.16%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 901.596μs    | +0.25σ       | +0.68%         |
| 0    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 2,962.131μs  | -0.98σ       | -0.85%         |
| 1    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 2,965.090μs  | -0.87σ       | -0.75%         |
| 2    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 3,024.127μs  | +1.42σ       | +1.23%         |
| 3    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 3,039.155μs  | +2.00σ       | +1.73%         |
| 4    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 2,981.601μs  | -0.23σ       | -0.20%         |
| 5    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 3,001.540μs  | +0.54σ       | +0.47%         |
| 6    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 2,958.978μs  | -1.11σ       | -0.95%         |
| 7    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 2,993.729μs  | +0.24σ       | +0.21%         |
| 8    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 2,979.617μs  | -0.31σ       | -0.26%         |
| 9    | SingleSortAndSearchLoopBenchmark  | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 2,969.025μs  | -0.72σ       | -0.62%         |
| 0    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.170μs      | -2.24σ       | -7.89%         |
| 1    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.310μs      | -0.55σ       | -1.95%         |
| 2    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.350μs      | -0.07σ       | -0.25%         |
| 3    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.440μs      | +1.01σ       | +3.57%         |
| 4    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.360μs      | +0.05σ       | +0.17%         |
| 5    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.470μs      | +1.37σ       | +4.84%         |
| 6    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.420μs      | +0.77σ       | +2.72%         |
| 7    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.310μs      | -0.55σ       | -1.95%         |
| 8    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.420μs      | +0.77σ       | +2.72%         |
| 9    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithOverlap                      |     | 100  | 2,009,448b | 2.310μs      | -0.55σ       | -1.95%         |
| 0    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 52.390μs     | -0.45σ       | -0.92%         |
| 1    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 52.440μs     | -0.41σ       | -0.83%         |
| 2    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 55.890μs     | +2.81σ       | +5.70%         |
| 3    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 52.140μs     | -0.69σ       | -1.39%         |
| 4    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 52.440μs     | -0.41σ       | -0.83%         |
| 5    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 52.610μs     | -0.25σ       | -0.50%         |
| 6    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 53.420μs     | +0.51σ       | +1.03%         |
| 7    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 52.360μs     | -0.48σ       | -0.98%         |
| 8    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 52.080μs     | -0.74σ       | -1.51%         |
| 9    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithOverlap                     |     | 100  | 2,009,448b | 53.000μs     | +0.11σ       | +0.23%         |
| 0    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 106.000μs    | +1.33σ       | +2.77%         |
| 1    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 103.560μs    | +0.19σ       | +0.40%         |
| 2    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 101.660μs    | -0.69σ       | -1.44%         |
| 3    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 102.980μs    | -0.08σ       | -0.16%         |
| 4    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 102.280μs    | -0.40σ       | -0.84%         |
| 5    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 101.280μs    | -0.87σ       | -1.81%         |
| 6    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 101.250μs    | -0.88σ       | -1.84%         |
| 7    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 102.150μs    | -0.46σ       | -0.97%         |
| 8    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 108.200μs    | +2.36σ       | +4.90%         |
| 9    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithOverlap                      |     | 100  | 2,009,448b | 102.100μs    | -0.49σ       | -1.01%         |
| 0    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.130μs      | +0.00σ       | +0.00%         |
| 1    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.110μs      | -1.08σ       | -0.94%         |
| 2    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.120μs      | -0.54σ       | -0.47%         |
| 3    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.150μs      | +1.08σ       | +0.94%         |
| 4    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.120μs      | -0.54σ       | -0.47%         |
| 5    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.160μs      | +1.63σ       | +1.41%         |
| 6    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.120μs      | -0.54σ       | -0.47%         |
| 7    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.120μs      | -0.54σ       | -0.47%         |
| 8    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.160μs      | +1.63σ       | +1.41%         |
| 9    | RandomizedArrayGeneratorBenchmark | benchGenerateSmallWithoutOverlap                   |     | 100  | 2,009,464b | 2.110μs      | -1.08σ       | -0.94%         |
| 0    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 50.280μs     | -0.36σ       | -0.32%         |
| 1    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 50.640μs     | +0.43σ       | +0.39%         |
| 2    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 50.470μs     | +0.06σ       | +0.06%         |
| 3    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 50.190μs     | -0.55σ       | -0.50%         |
| 4    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 51.250μs     | +1.77σ       | +1.60%         |
| 5    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 49.860μs     | -1.28σ       | -1.15%         |
| 6    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 50.440μs     | -0.00σ       | -0.00%         |
| 7    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 50.020μs     | -0.92σ       | -0.84%         |
| 8    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 51.230μs     | +1.73σ       | +1.56%         |
| 9    | RandomizedArrayGeneratorBenchmark | benchGenerateMediumWithoutOverlap                  |     | 100  | 2,009,464b | 50.040μs     | -0.88σ       | -0.80%         |
| 0    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 100.660μs    | -1.18σ       | -0.82%         |
| 1    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 102.310μs    | +1.16σ       | +0.81%         |
| 2    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 102.050μs    | +0.79σ       | +0.55%         |
| 3    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 102.240μs    | +1.06σ       | +0.74%         |
| 4    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 101.050μs    | -0.62σ       | -0.43%         |
| 5    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 100.540μs    | -1.35σ       | -0.94%         |
| 6    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 102.370μs    | +1.25σ       | +0.87%         |
| 7    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 100.890μs    | -0.85σ       | -0.59%         |
| 8    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 100.900μs    | -0.84σ       | -0.58%         |
| 9    | RandomizedArrayGeneratorBenchmark | benchGenerateLargeWithoutOverlap                   |     | 100  | 2,009,464b | 101.900μs    | +0.58σ       | +0.40%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.968μs      | +2.87σ       | +35.25%        |
| 1    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.120μs      | -0.28σ       | -3.39%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.228μs      | +0.12σ       | +1.53%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.280μs      | +0.32σ       | +3.90%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.046μs      | -0.55σ       | -6.77%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.032μs      | -0.60σ       | -7.40%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.065μs      | -0.48σ       | -5.90%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.074μs      | -0.45σ       | -5.49%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.038μs      | -0.58σ       | -7.13%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanWithOverlapSmallInput                     |     | 1000 | 2,009,448b | 2.094μs      | -0.37σ       | -4.58%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 152.256μs    | -0.69σ       | -0.65%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 153.490μs    | +0.16σ       | +0.15%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 155.257μs    | +1.38σ       | +1.30%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 152.355μs    | -0.62σ       | -0.59%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 156.492μs    | +2.22σ       | +2.11%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 153.104μs    | -0.11σ       | -0.10%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 151.936μs    | -0.91σ       | -0.86%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 153.465μs    | +0.14σ       | +0.13%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 151.687μs    | -1.08σ       | -1.03%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanWithOverlapMediumInput                    |     | 1000 | 2,009,448b | 152.541μs    | -0.49σ       | -0.47%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 338.518μs    | -0.86σ       | -1.00%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 337.651μs    | -1.07σ       | -1.25%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 351.743μs    | +2.47σ       | +2.87%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 339.428μs    | -0.63σ       | -0.73%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 340.159μs    | -0.44σ       | -0.52%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 341.023μs    | -0.23σ       | -0.26%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 345.252μs    | +0.84σ       | +0.97%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 344.043μs    | +0.53σ       | +0.62%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 342.082μs    | +0.04σ       | +0.05%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanWithOverlapLargeInput                     |     | 1000 | 2,009,448b | 339.370μs    | -0.64σ       | -0.75%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.765μs      | -1.46σ       | -2.10%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.764μs      | -1.50σ       | -2.16%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.811μs      | +0.31σ       | +0.45%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.803μs      | +0.00σ       | +0.01%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.806μs      | +0.12σ       | +0.17%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.815μs      | +0.47σ       | +0.67%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.792μs      | -0.42σ       | -0.60%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.811μs      | +0.31σ       | +0.45%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.801μs      | -0.07σ       | -0.11%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapSmallInput                  |     | 1000 | 2,009,464b | 1.861μs      | +2.24σ       | +3.22%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 135.402μs    | +0.04σ       | +0.12%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 146.198μs    | +2.76σ       | +8.10%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 137.917μs    | +0.67σ       | +1.98%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 133.682μs    | -0.39σ       | -1.15%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 132.673μs    | -0.65σ       | -1.90%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 134.788μs    | -0.11σ       | -0.33%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 132.723μs    | -0.63σ       | -1.86%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 132.826μs    | -0.61σ       | -1.78%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 132.811μs    | -0.61σ       | -1.79%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapMediumInput                 |     | 1000 | 2,009,464b | 133.359μs    | -0.47σ       | -1.39%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 292.598μs    | -0.54σ       | -2.58%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 328.275μs    | +1.94σ       | +9.30%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 297.456μs    | -0.20σ       | -0.96%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 292.324μs    | -0.56σ       | -2.67%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 294.247μs    | -0.42σ       | -2.03%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 291.718μs    | -0.60σ       | -2.87%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 290.832μs    | -0.66σ       | -3.17%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 294.404μs    | -0.41σ       | -1.98%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 329.517μs    | +2.03σ       | +9.71%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanWithoutOverlapLargeInput                  |     | 1000 | 2,009,464b | 292.118μs    | -0.57σ       | -2.74%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 5.460μs      | +3.00σ       | +79.26%        |
| 1    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.765μs      | -0.35σ       | -9.22%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.763μs      | -0.35σ       | -9.29%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.844μs      | -0.25σ       | -6.63%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.789μs      | -0.32σ       | -8.43%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.743μs      | -0.38σ       | -9.94%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.825μs      | -0.27σ       | -7.25%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.751μs      | -0.37σ       | -9.68%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.739μs      | -0.38σ       | -10.08%        |
| 9    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapSmallInput     |     | 1000 | 2,009,496b | 2.780μs      | -0.33σ       | -8.73%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 188.287μs    | -0.70σ       | -0.51%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 188.992μs    | -0.19σ       | -0.14%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 191.744μs    | +1.80σ       | +1.32%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 188.256μs    | -0.72σ       | -0.53%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 189.574μs    | +0.23σ       | +0.17%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 188.823μs    | -0.31σ       | -0.23%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 188.142μs    | -0.80σ       | -0.59%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 192.029μs    | +2.01σ       | +1.47%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 188.359μs    | -0.65σ       | -0.47%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapMediumInput    |     | 1000 | 2,009,496b | 188.329μs    | -0.67σ       | -0.49%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 414.599μs    | -0.45σ       | -8.37%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 543.444μs    | +1.09σ       | +20.10%        |
| 2    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 411.536μs    | -0.49σ       | -9.05%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 413.603μs    | -0.46σ       | -8.59%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 416.908μs    | -0.42σ       | -7.86%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 411.828μs    | -0.49σ       | -8.98%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 675.153μs    | +2.66σ       | +49.21%        |
| 7    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 413.888μs    | -0.46σ       | -8.53%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 412.152μs    | -0.48σ       | -8.91%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithOverlapLargeInput     |     | 1000 | 2,009,496b | 411.686μs    | -0.49σ       | -9.02%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.732μs      | +0.85σ       | +2.59%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.602μs      | -0.75σ       | -2.29%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.587μs      | -0.93σ       | -2.85%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.873μs      | +2.57σ       | +7.89%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.686μs      | +0.28σ       | +0.87%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.634μs      | -0.35σ       | -1.09%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.616μs      | -0.57σ       | -1.76%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.668μs      | +0.06σ       | +0.19%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.627μs      | -0.44σ       | -1.35%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapSmallInput  |     | 1000 | 2,009,496b | 2.604μs      | -0.72σ       | -2.21%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 192.449μs    | +0.20σ       | +0.12%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 191.950μs    | -0.23σ       | -0.14%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 192.078μs    | -0.12σ       | -0.07%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 192.338μs    | +0.10σ       | +0.06%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 195.395μs    | +2.76σ       | +1.65%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 191.214μs    | -0.87σ       | -0.52%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 191.404μs    | -0.71σ       | -0.42%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 192.499μs    | +0.24σ       | +0.15%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 191.458μs    | -0.66σ       | -0.40%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapMediumInput |     | 1000 | 2,009,496b | 191.390μs    | -0.72σ       | -0.43%         |
| 0    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 422.242μs    | -1.14σ       | -1.86%         |
| 1    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 424.483μs    | -0.82σ       | -1.34%         |
| 2    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 439.697μs    | +1.36σ       | +2.20%         |
| 3    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 424.009μs    | -0.89σ       | -1.45%         |
| 4    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 433.212μs    | +0.43σ       | +0.69%         |
| 5    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 439.400μs    | +1.31σ       | +2.13%         |
| 6    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 440.536μs    | +1.48σ       | +2.39%         |
| 7    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 428.025μs    | -0.32σ       | -0.51%         |
| 8    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 427.686μs    | -0.36σ       | -0.59%         |
| 9    | SortAndSearchScannerBenchmark     | benchScanRandomizedRangesWithoutOverlapLargeInput  |     | 1000 | 2,009,496b | 423.038μs    | -1.03σ       | -1.67%         |
+------+-----------------------------------+----------------------------------------------------+-----+------+------------+--------------+--------------+----------------+
```