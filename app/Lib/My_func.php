<?php

namespace App\Lib;

class My_func{
  public static function getAvg($scoreSum, $count){
    if($count == 0){
      $res = 0;
    }else{
      $res = floor($scoreSum / $count);
    }

    return $res;
  }

  public static function getMedian($score){
    if($score->count() == 0){
      $res = 0;
    }else{
      $res = $score->median();
    }

    return $res;
  }
}
