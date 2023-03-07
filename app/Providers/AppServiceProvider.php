<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\billing\BankPaymentGateway;
use App\billing\PaymentGatewayContract;
use App\billing\CreditPaymentGateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(PaymentGateway::class,function($app){
        //     return new PaymentGateway('usd');
        // });
        $this->app->singleton(PaymentGatewayContract::class,function($app){

            if(request()->has('payment_type') && request()->get('payment_type') == 'credit'){
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
