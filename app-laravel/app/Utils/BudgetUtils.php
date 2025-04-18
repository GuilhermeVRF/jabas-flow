<?php

namespace App\Utils;

class BudgetUtils{
    public static function formatType($type){
        switch($type){
            case 'income': return 'Receita';
            case 'expense': return 'Despesa';
        }
    }

    public static function formatStatus($status){
        switch($status){
            case 'pending': return 'Pendente';
            case 'paid': return 'Pago';
            case 'canceled': return 'Cancelado';
        }
    }

    public static function formatAmount($amount){
        return 'R$ '.number_format($amount, 2, ',', '.');
    }
}