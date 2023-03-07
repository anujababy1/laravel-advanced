<?php

namespace App\Http\Controllers;
use App\billing\PaymentGatewayContract;
use App\orders\OrderDetails;

use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    
    public function index(OrderDetails $orderDetails,PaymentGatewayContract $PaymentGatewayContract){

        // $a = new PaymentGateway();
        // $b = $a->charge(200); 
        // dd($b);

        //dd($PaymentGateway->charge(300));

        /* when constructor in the class file */

        // $a = new PaymentGateway('usd');
        // $b = $a->charge(200); 
        // dd($b);
        
        //dd($PaymentGateway->charge(300));

        $order_details = $orderDetails->all();
        //dd($order_details);

        $payment_gateway= $PaymentGatewayContract->charge(3000);
        dd($payment_gateway);
    }
}
