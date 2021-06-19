<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function getCurrencyRates($price){
        $getCurrencies = Currency::where('status', 1)->get();
        foreach ($getCurrencies as $currency) {
            if($currency->currency_code == "USD"){
                $USD_Rate = round($price/$currency->exchange_rate, 2);
            }
            elseif($currency->currency_code == "EURO"){
                $EURO_Rate = round($price/$currency->exchange_rate, 2);
            }
        }

        $currienciesArray = array('USD_Rate'=>$USD_Rate, 'EURO_Rate'=>$EURO_Rate);
        return $currienciesArray;
    }
}
