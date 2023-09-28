<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SortArray {

    private $data;

    public function __construct($arr) {
        $this->data = $this->bubbleSort($arr);
    }

    private function bubbleSort($arr) {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    // Swap the elements
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
        return $arr;
    }

    public function getMedian() {
        $n = count($this->data);
        if ($n % 2 == 0) {
            $middle1 = $this->data[$n / 2 - 1];
            $middle2 = $this->data[$n / 2];
            return ($middle1 + $middle2) / 2;
        } else {
            return $this->data[($n - 1) / 2];
        }
    }

    public function getLargestValue() {
        return end($this->data);
    }

    public function getData() {
        return $this->data;
    }
}
