<?php

namespace App\Services;

class EventService
{
    public function dateSide($date){
        return date('Y/m/d',strtotime($date));
    }

    public function dateYear($date){
        return date('Y',strtotime($date));
    }

    public function dateMonth($date){
        return date('m',strtotime($date));
    }

    public function dateDay($date){        
        return date('d',strtotime($date));    
    }

    public function dateWeek($date){
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
        return $week[$weekno];
    }

    public function dateTime($date){
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
            case 'movie':
                $field = "映像";
                break;
            case 'other':
                $field = "その他";
                break;
            default:
                $field = $f;
                break;
        }
        return $field;
    }
    public function condition($event){
        
        $dsd = date('Y-m-d',strtotime($event->opening_date));
        $dst = date('H:i:s',strtotime($event->start_at));
        $det = date('H:i:s',strtotime($event->end_at));

        $nowdate = date('Y-m-d');
        $nowtime = date('H:i:s');

        if ($dsd>$nowdate) {
            //開催日が今より後
            $c = "開催前";
            return $c;
        }elseif($dsd===$nowdate){
            //開催日当日
            if ($dst>$nowtime) {
                $c = "開催前";
            }elseif($nowtime>$det){
                $c = "終了";
            }else{
                $c = '開催中';
            }

        }elseif($dsd<$nowdate) {
            //終了日が今より前
            $c = "終了";
        }
        return $c;
    }
    
    public function conditionClass($event){

        $dsd = date('Y-m-d',strtotime($event->opening_date));
        $dst = date('H:i:s',strtotime($event->start_at));
        $det = date('H:i:s',strtotime($event->end_at));

        $nowdate = date('Y-m-d');
        $nowtime = date('H:i:s');

        if ($dsd>$nowdate) {
            //開催日が今より後
            $c = "before";
            return $c;
        }elseif($dsd===$nowdate){
            //開催日当日
            if ($dst>$nowtime) {
                $c = "before";
            }elseif($nowtime>$det){
                $c = "finished";
            }else{
                $c = 'open';
            }

        }elseif($dsd<$nowdate) {
            //終了日が今より前
            $c = "finished";
        }
        return $c;
    }

    public function status($event) {
        $status_name = [
            'open' => '公開中',
            'close' => '下書き',
            'stop' => '中止'
        ];
        return $status_name[$event->status];
    }

    public function isBetweenRecruit($event) {
        // dd($event->recruit_end_date . ' ' . $event->recruit_end_time);
        $rStartDate = date('Y-m-d H:i:s', strtotime($event->recruit_start_date . ' ' . $event->recruit_start_time));
        $rEndDate = date('Y-m-d H:i:s', strtotime($event->recruit_end_date . ' ' . $event->recruit_end_time));
        $toDay = date("Y-m-d H:i:s");        
        return strtotime($rStartDate) <= strtotime($toDay) && strtotime($rEndDate) >= strtotime($toDay);
    }
}
