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
}
