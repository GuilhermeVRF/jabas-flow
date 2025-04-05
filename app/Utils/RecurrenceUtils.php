<?php

namespace App\Utils;

class RecurrenceUtils{
    public static function formatFrequency($frequency){
        switch($frequency){
            case 'daily': return 'Diário';
            case 'weekly': return 'Semanal';
            case 'monthly': return 'Mensal';
        }
    }
}