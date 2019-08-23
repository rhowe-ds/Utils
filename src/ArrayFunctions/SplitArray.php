<?php
namespace rhowe\ArrayFunctions;

class SplitArray {

    public static function splitMostEvent(int $splits, array $sourceArray): array{
        $per_line = (int) floor(count($sourceArray) / ((count($sourceArray) % $splits) === 0 ? $splits : $splits - 1));
        $return = [];
    
        for($i = 1; $i < $splits; $i++){
            $line = array_splice($sourceArray, 0, $per_line);
            $return[] = $line;
        }
        $return[] = $sourceArray;
        return $return;
    }

    public static function splitRoundRobin(int $splits, array $sourceArray): array{
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