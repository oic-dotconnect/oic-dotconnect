<?php

namespace App\Services;

class EventService
{
    public function dateyear($date){
        return date('Y',strtotime($date));
    }

    public function dateday($date){
        $week = array(
            '日',
            '月',
            '火',
            '水',
            '木',
            '金',
            '土'
        );
        $weekno = date('w',strtotime($date));
        $d = date('m/d',strtotime($date))."($week[$weekno])";
        return $d;
    }

    public function datetime($date){
        $d = date('H:i',strtotime($date));
        return $d;
    }
    public function field($f){
        switch ($f) {
            case 'it':
                $field = "IT";
                break;
            case 'design':
                $field = "デザイン";
                break;
            case 'game':
                $field = "ゲーム";
                break;

            default:
                $field = $f;
                break;
        }
        return $field;
    }
    public function condition($s_date,$s_time,$e_date,$e_time){
        $dsd = date('Y-m-d',strtotime($s_date));
        $dst = date('H:i:s',strtotime($s_time));
        $ded = date('Y-m-d',strtotime($e_date));
        $det = date('H:i:s',strtotime($e_time));

        $nowdate = ('Y-m-d');
        $nowtime = ('H:i:s');

        if ($ded>=$nowdate) {
            if ($det < $nowtime) {
                $c = "開催後";
            }else{
                $c = "開催中";
            }
        }else{
            $c = "開催中";
        }
        if ($dsd>=$nowdate) {
            if ($dst>$nowtime) {
                $c = "開催前";
            }else{
                $c = "開催中";
            }
        };
        return $c;
    }
}
