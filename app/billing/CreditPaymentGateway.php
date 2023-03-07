<?php
namespace App\billing;
use Illuminate\Support\Str;
use App\billing\PaymentGatewayContract;

class CreditPaymentGateway implements PaymentGatewayContract {

    private $currency;
    private $discount;

    public function __construct($currency){
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount) {
        $this->discount = $amount;
    }
    public function charge($amount){

        return [
            'amount'=>$amount - $this->discount,
            'confirmation_number' =>Str::random(),
            'currency'=>$this->currency,
            'discount' =>$this->discount,
            'fees' => $amount * 0.04
        ];
    }

   
}