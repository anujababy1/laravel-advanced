<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\billing\BankPaymentGateway;
use App\billing\PaymentGatewayContract;
use App\billing\CreditPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Models\Channel;
use App\Http\View\Composers\ChannelComposer;
use App\PostcardSendingService;
use Illuminate\Support\Str;
use App\Mixins\StrMixins;

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


        $this->app->singleton('Postcard',function($app){
                return new PostcardSendingService('us',4,6);
            
        });

        /* macro */
        Str::macro('formatPhoneNumber',function($number){
            return '+1 ('.substr($number,0,3).')-'.substr($number,3,3).'-'.substr($number,6);
        });

        Str::Mixin(new StrMixins(),false);
    }
}
