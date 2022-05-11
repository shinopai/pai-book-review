<?php

namespace App\Lib;

class My_func{
  public static function getAvg($scoreSum, $count){
    $res = floor($scoreSum / $count);

    return $res;
  }

  public static function getMedian($score){
    $res = $score->median();

    return $res;
  }
}
