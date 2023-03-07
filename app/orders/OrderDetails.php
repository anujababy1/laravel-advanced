<?php
namespace App\orders;
//use Illuminate\Support\Str;
use App\billing\PaymentGatewayContract;

class OrderDetails {

    private $PaymentGatewayContract;

    public function __construct(PaymentGatewayContract $PaymentGatewayContract){
        $this->paymentGatewayContract =$PaymentGatewayContract;
        
    }

    public function all(){
        $this->paymentGatewayContract->setDiscount(500);
        return [
            'name'=>'kkk',
            'address' => '199 richvale drive s'
        ];
    }
    
}