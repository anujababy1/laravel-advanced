<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\billing\BankPaymentGateway;
use App\billing\PaymentGatewayContract;
use App\billing\CreditPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Models\Channel;
use App\Http\View\Composers\ChannelComposer;

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
        /* channels variabl will avialble in all view */
        //View::share('channels',Channel::orderBy('name')->get());

        /* channels variabl will avialble in channels.index & posts.create blade */
        // View::composer(['channels.index','posts.create'],function($view){
        //     $view->with('channels',Channel::orderBy('name')->get());
        // });
        
         /* channels variabl will avialble in channels folder & posts.create blade */
        View::composer(['channels.*','posts.create'],ChannelComposer::class);
    }
}
