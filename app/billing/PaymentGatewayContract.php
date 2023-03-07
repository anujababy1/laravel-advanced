<?php
namespace App\billing;
use Illuminate\Support\Str;

interface PaymentGatewayContract {

    public function setDiscount($amount);
    public function charge($amount);
   
}