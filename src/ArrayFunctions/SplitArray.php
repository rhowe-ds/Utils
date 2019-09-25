<?php
namespace rhowe\ArrayFunctions;

class SplitArray {

    /**
     * This distribution will create the most even retured elements, with the remainder going into the final element
     *
     * @param int $splits
     * @param array $sourceArray
     * @return array
     */
    public static function maxEvenDistribution(int $splits, array $sourceArray): array {
        if ($splits === 1) {
            return [$sourceArray];
        }
        if ($splits === 2) {
            $per_line = (int)floor(count($sourceArray) / $splits);
        } else {
            $per_line = (int)floor(count($sourceArray) / ((count($sourceArray) % $splits) === 0 ? $splits : $splits - 1));
        }
        $return = [];
    
        for($i = 1; $i < $splits; $i++){
            $line = array_splice($sourceArray, 0, $per_line);
            $return[] = $line;
        }
        $return[] = $sourceArray;
        return $return;
    }

    /**
     * This distribution will evenly distribute the remainder items starting with the first element
     *
     * @param int $splits
     * @param array $sourceArray
     * @return array
     */
    public static function mostEvenDistribution(int $splits, array $sourceArray): array {
        if($splits === 1) { return [$sourceArray]; }
        $line_count = (int)ceil((count($sourceArray) / $splits));
        $return = [];

        for($i = 1; $i <= $splits; $i++){
            $line = array_splice($sourceArray, 0, $line_count);
            $return[] = $line;
            if($splits - $i > 0){
                $line_count = (int) ceil(count($sourceArray) / ($splits - $i));
            }
        }

        return $return;
    }
}